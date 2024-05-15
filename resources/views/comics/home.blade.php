@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="add-button">
            <a class="btn btn-primary" href="{{ route('comics.create') }}">Add</a>
        </div>
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-4">
                    <div class="card">
                        <img src="{{ $comic->thumb }}" alt="" class="card-img">
                        <div class="card-body">
                            <h1>{{ $comic->title }}</h1>
                            <a class="btn btn-primary" href="{{ route('comics.show', $comic) }}">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
