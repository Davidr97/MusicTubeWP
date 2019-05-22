@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(\Illuminate\Support\Facades\Session::has("error_messages"))
                    <ul class="text-danger">
                        @foreach(\Illuminate\Support\Facades\Session::get("error_messages") as $mess)
                            <li>{{ $mess }}</li>
                    </ul>
                    @endforeach
                @endif
                <edit-album
                        artists="{{ $artists }}"
                        url=" {{ url("album/" . $album->id) }}"
                        name="{{ $album->name }}"
                        artist_id="{{ $album->artist_id }}"
                        year="{{ $album->year_released }}"
                        photo_url="{{ $album->cover_photo_url }}"></edit-album>
            </div>
        </div>
    </div>
@endsection
