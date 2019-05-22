@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9 col-md-offset-1 d-inline">
                                @if($album->cover_photo_url!=null && @getimagesize($album->cover_photo_url))
                                    <img src="{{$album->cover_photo_url}}" id="accountAvatar" class="d-inline">
                                @endif
                                <h1 class="d-inline pt-2"> {{$album->name}} </h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Year Released') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$album->year_released}}
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Artist') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$album->artist->name}}
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Number of Tracks') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$album->tracks->count()}}
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Tracks') }}</label>
                            <label class="col-md-6 col-form-label">
                                <ol>
                                    @foreach($album->tracks as $track)
                                        <li><a href="{{ url("/play/song/" . $track->id) }}"> {{$track->name}}</a></li>
                                    @endforeach
                                </ol>
                            </label>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <a class="mr-3 btn btn-link" href="{{url('album/' . $album->id . "/edit")}}">Edit</a>
                        <form method="Post" action="{{ url('album/' . $album->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="mr-3 btn btn-link" value="Delete">
                        </form>
                        <a class="mr-3 btn btn-link" href="{{url('album')}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
