@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(\Illuminate\Support\Facades\Session::has("error_messages"))
                    <ul class="text-danger">
                    @foreach(\Illuminate\Support\Facades\Session::get("error_messages") as $mess)
                        <li>{{ $mess }}</li>
                        @endforeach
                    </ul>
                @endif
                <new-album
                    artists="{{ $artists }}"
                    url=" {{ url('/album') }}"></new-album>
            </div>
        </div>
    </div>
@endsection
