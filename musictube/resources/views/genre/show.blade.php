@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10">
                                {{ __('Edit Genre') }}
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('genre')}}">
                                    Back
                                </a>
                            </div>
                        </div></div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('genre/' . $genre->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$genre->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('name') }}</strong><br/>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <div class="col-md-3 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
