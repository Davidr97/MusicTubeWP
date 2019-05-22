@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <player
                    lyrics="{{$track->lyrics}}"
                    name="{{$track->name}}"
                    album_photo="{{$track->album->cover_photo_url}}"
                    url="{{url('audio/' . $track->id )}}"
                    song_id="{{ $track->id }}"
                    user_id="{{ Auth::id() != null ? Auth::id() : -1 }}"
                    likes="{{ $track->likes->count() }}"
                    dislikes="{{ $track->dislikes->count() }}"
                    views="{{ $track->listened_by->sum('times') }}"
                    subscribe="{{ "/subscribeTo/" . $track->id }}"></player>
                <post-comment-form  track_id="{{$track->id}}"
                                    user_id="{{Auth::id()}}"></post-comment-form>
                <comment-list comments_props="{{$comments}}" user_id="{{Auth::id()}}" root="true"></comment-list>
            </div>
            <div class="col-5">
                @foreach($related  as $t)
                    @if($t->id == $track->id)
                        @continue;
                    @endif
                    <side-track
                            name="{{ $t->name }}"
                            album_name="{{ $t->album_name }}"
                            description = "{{ $t->description }}"
                            url="{{ url("play/song/" . $t->id ) }}"
                            image="{{ $t->cover_photo_url }}">
                    </side-track>
                @endforeach
            </div>
        </div>
    </div>
@endsection

