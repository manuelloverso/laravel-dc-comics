@extends('layouts.app')

@section('content')
    <div class="container text-white">
        <h1>Edit '{{ $comic->title }}'</h1>
        <form action="{{ route('comics.update', $comic) }}" method="post">
            @method('PUT')
            @csrf {{-- this is a laravel directive to protect your application from cross-site request forgery --}}

            {{-- title input --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="add the title"
                    value="{{ $comic->title }}" />
            </div>

            {{-- thumb input --}}
            <div class="mb-3">
                <label for="thumb" class="form-label">Poster Image</label>
                <input type="text" name="thumb" id="thumb" class="form-control" placeholder="add the thumb"
                    value="{{ $comic->thumb }}" />
            </div>

            {{-- price input --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $comic->price }}"
                    placeholder="add the price $00.00" />
            </div>

            {{-- series input --}}
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" name="series" id="series" class="form-control" placeholder="add the series"
                    value="{{ $comic->series }}" />
            </div>

            {{-- sale_date input --}}
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ $comic->sale_date }}"
                    placeholder="add the sale date" />
            </div>

            {{-- type input --}}
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="add the type"
                    value="{{ $comic->type }}" />
            </div>

            {{-- description input --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="add the description">value="{{ $comic->thumb }}"</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Edit
            </button>

        </form>
    </div>
@endsection
