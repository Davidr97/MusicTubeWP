@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9 col-md-offset-1 d-inline">
                                @if($artist->photo_url!=null && @getimagesize($artist->photo_url))
                                    <img src="{{$artist->photo_url}}" id="accountAvatar" class="d-inline">
                                @endif
                                <h1 class="d-inline pt-2"> {{$artist->name}} </h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$artist->country}}
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Year Formed') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$artist->year_formed}}
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$artist->description}}
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Number of Albums') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$artist->albums->count()}}
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Number of Tracks') }}</label>
                            <label class="col-md-6 col-form-label">
                                {{$artist->number_of_tracks()}}
                            </label>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <a class="mr-3 btn btn-link" href="{{url('artist/' . $artist->id . "/edit")}}">Edit</a>
                        <form method="Post" action="{{ url('artist/' . $artist->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="mr-3 btn btn-link" value="Delete">
                        </form>
                        <a class="mr-3 btn btn-link" href="{{url('artist')}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
