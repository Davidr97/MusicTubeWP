@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload a track</div>
                    <div class="card-body">
                        @if (Session::has('error_messages'))
                            <div class="flash alert-danger">
                                @foreach(Session::get('error_messages') as $m)
                                    <p>{{ $m}}</p>
                                @endforeach
                            </div>
                        @endif
                        <add-track-form album_props="{{$albums}}" uploaded_file=""></add-track-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection