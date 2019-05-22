@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Available Genres</div>

                    <div class="card-body">
                        <ul>
                            @foreach($genres as $genre)
                                <li>
                                    <div class="row">
                                        <a href="{{ url('genre/' . $genre->id) }}" class="col-2 p-2 ml-3">{{$genre->name}}</a>
                                        <form method="POST" action="{{ url('genre/' . $genre->id) }}" class="d-inline col-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                            <a href="{{ url('genre/create') }}">Add new Genre</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
