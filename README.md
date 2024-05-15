## Steps

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
