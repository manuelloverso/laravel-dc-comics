@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-4">
                    <div class="card">
                        <img src="{{ $comic->thumb }}" alt="" class="card-img">
                        <div class="card-body">
                            <h1>{{ $comic->title }}</h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
