@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-10 offset-1">
            <h3>My albums</h3>
            <small><a href="{{ url('album/create') }}">Add new Album</a></small>
        </div>
    </div>
    <hr class="col-10 offset-1">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                @foreach($albums as $album)
                    <div class="col-6 p-4">
                        <div class="row">
                            <div class="col-6">
                                <img class="img-thumbnail" src="{{ $album->cover_photo_url }}">
                            </div>
                            <div class="col-6">
                                <a href="{{ url("/album/" . $album->id) }}"><h4>{{ $album->name }}</h4></a>
                                <small>Release date: {{ $album->year_released }}</small><br/>
                                <small>Number of tracks: {{ $album->tracks->count() }}</small>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>



@endsection
