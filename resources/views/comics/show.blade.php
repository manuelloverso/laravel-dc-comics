@extends('layouts.app')

@section('content')
    <div class="container text-white">
        <h1 class="mb-4">{{ $comic->title }}</h1>
        <img class="single-thumb mb-4" src="{{ $comic->thumb }}" alt="">
        <p><strong>Series: </strong>{{ $comic->series }}</p>
        <p><strong>Price: </strong>{{ $comic->price }}</p>
        <p><strong>Release Date: </strong>{{ $comic->sale_date }}</p>
        <p>{{ $comic->description }}</p>
        <a class="btn btn-primary" href="{{ route('comics.index') }}">Back</a>
        <a class="btn btn-primary" href="{{ route('comics.edit', $comic) }}">Edit</a>
        @include('partials.delete-modal')
    </div>
@endsection
