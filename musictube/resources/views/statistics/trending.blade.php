@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-10">
                <h2>Trending Songs</h2>
            </div>

            <div class="col-10">
                <hr>
            </div>

            <div class="col-md-10">
                @foreach($all_tracks as $track)
                    <search-result
                            name="{{ $track->name }}"
                            description = "{{ $track->description }}"
                            url="{{ url("play/song/" . $track->id ) }}"
                            image="{{ $track->album->cover_photo_url }}"
                            uploader="{{ $track->user_id->name }}">

                    </search-result>
                @endforeach
            </div>
        </div>
    </div>
@endsection
