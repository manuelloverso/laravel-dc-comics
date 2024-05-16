@extends('layouts.app')

@section('content')
    <div class="container text-white">
        @include('partials.validate-errors')
        <h1>Add a new Comic book</h1>
        <form action="{{ route('comics.store') }}" method="post">
            @csrf {{-- this is a laravel directive to protect your application from cross-site request forgery --}}

            {{-- title input --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="add the title" value="{{ old('title') }}" />
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- thumb imput --}}
            <div class="mb-3">
                <label for="thumb" class="form-label">Poster Image</label>
                <input type="text" name="thumb" id="thumb"
                    class="form-control  @error('thumb') is-invalid @enderror" placeholder="add the thumb"
                    value="{{ old('thumb') }}" />
                @error('thumb')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- price imput --}}
            <div class="mb-3">
                <label for="price" class="form-label ">Price</label>
                <input type="text" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" placeholder="add the price $00.00"
                    value="{{ old('price') }}" />
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- series imput --}}
            <div class="mb-3">
                <label for="series" class="form-label ">Series</label>
                <input type="text" name="series" id="series"
                    class="form-control @error('series') is-invalid @enderror" placeholder="add the series"
                    value="{{ old('series') }}" />
                @error('series')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- sale_date imput --}}
            <div class="mb-3">
                <label for="sale_date" class="form-label ">Sale Date</label>
                <input type="date" name="sale_date" id="sale_date"
                    class="form-control @error('sale_date') is-invalid @enderror" placeholder="add the sale date"
                    value="{{ old('sale_date') }}" />
                @error('sale_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- type imput --}}
            <div class="mb-3">
                <label for="type" class="form-label ">Type</label>
                <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror"
                    placeholder="add the type" value="{{ old('type') }}" />
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label ">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5" placeholder="add the description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Submit
            </button>

        </form>
    </div>
@endsection
