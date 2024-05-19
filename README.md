# Steps

## CRUD

-   add the file that the seeder will use to fill the database
-   create model, migration, controller, seeder, resource with the artisan command
-   fill the create-table migration with the right columns

```php
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('thumb')->nullable();
            $table->string('price', 15)->nullable();
            $table->string('series', 100)->nullable();
            $table->date('sale_date')->nullable();
            $table->string('type', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
```

-   fill the seeder

```php
public function run(): void
    {
        $comics = config('comics.comics');

        foreach ($comics as $comic) {
            $newComic = new Comic();
            $newComic->title = $comic['title'];
            $newComic->description = $comic['description'];
            $newComic->thumb = $comic['thumb'];
            $newComic->price = $comic['price'];
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->type = $comic['type'];
            $newComic->save();
        }
    }
```

-   migrate and seed the db
-   return the view home in the inxed method of the controller and pass the data with the compact method

```php
public function index()
    {
        $comics = Comic::all();
        return view('comics.home', compact('comics'));
    }
```

-   the web.php file should look something like this

```php
Route::get('/', [ComicController::class, 'index'])->name('home');
Route::resource('/comics', ComicController::class);
```

-   add a link in the home page to redirect to the single item page

```html
<a class="btn btn-primary" href="{{ route('comics.show', $comic) }}">
    See More
</a>
```

-   now change the show method in the controller to return the right view and pass the single item

```php
 public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }
```

-   the views\comics folder should now have home and show files
-   you can show the single item in the show file as it was passed by the show method in the controller
-   add a button in the home page to add an item

```html
<a class="btn btn-primary" href="{{ route('comics.create') }}">Add</a>
```

-   update the create method in the controller file. It should only return the comics.create view
-   add a form in the create view to fill and post the item you want to push to the db , the form action should point to the store route

```html
<form action="{{ route('comics.store') }}" method="post"></form>
```

-   update the store method in the controller

```php
public function store(Request $request)
    {
        //dd($request->all());

        Comic::create($request->all());

        //redirect

        return to_route('comics.index');
    }
```

-   update the Comic Model in orther to exclude the \_token field when submitting the data into the db

```php
class Comic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'thumb', 'price', 'series', 'sale_date', 'type'];
}
```

-   add the edit button in the html to redirect to the edit page

```html
<a class="btn btn-primary" href="{{ route('comics.edit', $comic) }}">Edit</a>
```

-   add the form in the edit page with the method 'PUT' using the blade directive

```html
<form action="{{ route('comics.update', $comic) }}" method="post">
    @method('PUT')
</form>
```

-   update the edit and the update methods in the controller

```php
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        //dd($request->all());
        $comic->update($request->all());
        return to_route('comics.show', $comic); //passing the $comic variable just because the show rout needs the single item
    }
```

-   add a button or a modal to trigger the destroy method for deleting the single item

```html
<form action="{{ route('comics.destroy', $comic) }}" method="post">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-danger">Confirm</button>
</form>
```

-   update the destroy method in the controller

```php
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index');
    }
```

## VALIDATION

-   change the store method in the controller so that it validates the data received from the form in the create route, then do it to validate the edit form as well

```php
public function store(Request $request)
    {
        //dd($request->all());

        //Comic::create($request->all());

        $val_data = $request->validate([
            'title' => 'required|min:2|max:100',
            'description' => 'nullable|max:500',
            'thumb' => 'nullable|max:255',
            'price' => 'nullable|max:15',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => 'nullable|max:50',
        ]);

        Comic::create($val_data);

        //redirect

        return to_route('comics.index');
    }
```

-   here is the validation rules laravel offers -> https://laravel.com/docs/10.x/validation#available-validation-rules

-   now show the validation errors in the page when the user fails to submit the form

-   the snippet below will show an alert containing a list of errors

```html
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
```

-   add this in the input tags to add the invalid class if there was an error in the compilation

```html
class="@error('title') is-invalid @enderror"
<!-- title here refers to the input name -->
```

-   show an error message for the single input too

```html
@error('title')
<div class="text-danger">{{ $message }}</div>
@enderror
```

-   you dont want users to lose their input values after the form is refreshed if the validation returned some errors, use this

```html
value="{{old('title')}}"
```

-   do the same for the edit page (can just create a partial)

-   in the edit page the old method for input values differs. Here you have to show the last value inserted if the validation returned errors, or , if there were no errors in the specific input, the original value that the comic had initially.

```html
value="{{old('title', $pasta->title)}}"
<!-- the second value is the original title -->
```

### Form Request Validation

-   create the request files with artisan for both methods store and update

```bash
php artisan make:request StoreComicRequest
php artisan make:request UpdateComicRequest
```

-   move the validation rules to these files so that we keep clean the controller's methods

```php
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:100',
            'description' => 'nullable|max:1000',
            'thumb' => 'nullable|max:255',
            'price' => 'nullable|max:15',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => 'nullable|max:50',
        ];
    }
```

-   now we update the controller changing the class from Request to StoreComicRequest (or Update for update method) and validate() to validated()

```php
public function store(StoreComicRequest $request)
    {
        //dd($request->all());

        //Comic::create($request->all());

        $val_data = $request->validated();

        Comic::create($val_data);

        //redirect


        return to_route('comics.index');
    }
```

-   do the same for update method

TODO: return the show view once created the new item , do what fabio was saying about unique
