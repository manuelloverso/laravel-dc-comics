@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add a new Comic book</h1>
        <form action="{{ route('comics.store') }}" method="post">
            @csrf {{-- this is a laravel directive to protect your application from cross-site request forgery --}}

            {{-- title input --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="add the title" />
            </div>

            {{-- thumb imput --}}
            <div class="mb-3">
                <label for="thumb" class="form-label">Poster Image</label>
                <input type="text" name="thumb" id="thumb" class="form-control" placeholder="add the thumb" />
            </div>

            {{-- price imput --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control"
                    placeholder="add the price $00.00" />
            </div>

            {{-- series imput --}}
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" name="series" id="series" class="form-control" placeholder="add the series" />
            </div>

            {{-- sale_date imput --}}
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" name="sale_date" id="sale_date" class="form-control"
                    placeholder="add the sale date" />
            </div>

            {{-- type imput --}}
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="add the type" />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="add the description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Submit
            </button>

        </form>
    </div>
@endsection
