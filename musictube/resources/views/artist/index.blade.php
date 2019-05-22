@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-10 offset-1">
            <h3>My artists</h3>
            <small><a href="{{ url('artist/create') }}">Add new Artist</a></small>
        </div>
    </div>
    <hr class="col-10 offset-1">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                @foreach($artists as $artist)
                    <div class="col-6 p-4">
                        <div class="row">
                            <div class="col-6">
                                <img class="img-thumbnail" src="{{ $artist->photo_url }}" style="height: 150px; width: 150px;">
                            </div>
                            <div class="col-6">
                                <a href="{{ url("/artist/" . $artist->id) }}"><h4>{{ $artist->name }}</h4></a>
                                <small>{{ $artist->country }}</small><br/>
                                <small>Formed Year: {{ $artist->year_formed }}</small><br/>
                                <small>Number of albums: {{ $artist->albums->count() }}</small><br/>
                                <small>Number of tracks: {{ $artist->albums->sum(function($album){ return $album->tracks->count(); }) }}</small>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
