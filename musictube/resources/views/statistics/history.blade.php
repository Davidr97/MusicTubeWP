@extends('layouts.app')

@section('content')

    <div class="row">
        <h2 class="offset-1">Recent Played Songs</h2>

    </div>
    <div class="row">
        <hr class="offset-1 col-10">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($all_tracks as $track)
                    <search-result
                            name="{{ $track->name }}"
                            description = "{{ $track->description }}"
                            url="{{ url("play/song/" . $track->id ) }}"
                            image="{{ $track->cover_photo_url }}"
                            uploader="{{ $track->uploader }}">

                    </search-result>
                @endforeach
            </div>
        </div>
    </div>
@endsection

