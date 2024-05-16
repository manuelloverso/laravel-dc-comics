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
                            <h5 class="title text-uppercase">{{ $comic->series }}</h5>
                            <a class="btn btn-primary" href="{{ route('comics.show', $comic) }}">See More</a>
                            <a class="btn btn-primary" href="{{ route('comics.edit', $comic) }}">Edit</a>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $comic->id }}">
                                Delete
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade text-dark" id="modalId-{{ $comic->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="#modalTitleId-{{ $comic->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-{{ $comic->id }}">
                                                Deleting '{{ $comic->title }}'
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">Are you sure you want to delete this comic? The action will
                                            be permanent</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <form action="{{ route('comics.destroy', $comic) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Confirm
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
