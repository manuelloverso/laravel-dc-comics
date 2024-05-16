@extends('layouts.app')

@section('content')
    <div class="container text-white">
        <div class="add-button py-4">
            <h2 class="d-inline-block">Add a new comic book by clicking here --></h2>
            <a class="btn btn-primary" href="{{ route('comics.create') }}">Add</a>
        </div>
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-12 col-md-4 col-lg-3 g-4">
                    <div class="card border-0 rounded-0 h-100 text-white">
                        <div class="card-img">
                            <img class="w-100 thumb" src="{{ $comic->thumb }}" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="title text-uppercase">{{ $comic->title }}</h5>
                            <a class="btn btn-primary" href="{{ route('comics.show', $comic) }}">See More</a>
                            <a class="btn btn-primary" href="{{ route('comics.edit', $comic) }}">Edit</a>
                            @include('partials.delete-modal')

                        </div>
                    </div>
                </div>
            @endforeach
            {{ $comics->links() }}
        </div>
    </div>
@endsection
