@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit uploaded track</div>
                    <div class="card-body">
                        @if (Session::has('error_messages'))
                            <div class="flash alert-danger">
                                @foreach(Session::get('error_messages') as $error)
                                    <p>{{ $error}}</p>
                                @endforeach
                            </div>
                        @endif
                        @if (Session::has('message'))
                            <div class="flash alert-info">
                                <p>{{Session::get('message')}}</p>
                            </div>
                        @endif
                        <edit-track-form id="{{$track->id}}"
                                         name="{{$track->name}}"
                                         lyrics="{{$track->lyrics}}"
                                         description="{{$track->description}}"
                                         album="{{$track->album_id}}"
                                         album_props="{{$albums}}"></edit-track-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection