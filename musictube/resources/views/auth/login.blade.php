@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <login email_errors="{{$errors->first('email')}}"
                   password_errors="{{$errors->first('password')}}"></login>
        </div>
    </div>
</div>
@endsection
