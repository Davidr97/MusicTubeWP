@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <h2>Active Subscriptions</h2>
            </div>

            <div class="col-10">
                <hr>
            </div>
        </div>

        <div class="row">
            @foreach($users as $user)
                <user-info
                    url="{{url("subscriptions/" . $user->id)}}"
                    name="{{$user->name}}"
                    surname="{{ $user->surname }}"
                    email="{{ $user->email }}"
                    image="{{$user->avatar_url}}"></user-info>
            @endforeach
        </div>
    </div>

@endsection