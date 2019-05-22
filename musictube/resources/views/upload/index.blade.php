@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3>Your Tracks</h3>
                @if (Session::has('message'))
                    <div class="flash alert-success">
                        <p>{{Session::get('message')}}</p>
                    </div>
                @endif
                <a href="{{route('add_track')}}">Upload a new track</a>
                <div class="mt-4">
                    @if($tracks->count()==0)
                        <div>You have no tracks uploaded</div>
                    @else
                        <track-list tracks_props="{{$tracks}}"></track-list>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
