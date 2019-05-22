@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(\Illuminate\Support\Facades\Session::has("error_messages"))
                    <ul class="text-danger">
                        @foreach(\Illuminate\Support\Facades\Session::get("error_messages") as $mess)
                            <li>{{ $mess }}</li>
                    </ul>
                    @endforeach
                @endif
                <edit-artist
                        url=" {{ url("artist/" . $artist->id) }}"
                        name="{{ $artist->name }}"
                        description="{{ $artist->description }}"
                        country="{{ $artist->country }}"
                        year="{{ $artist->year_formed }}"
                        band="{{ $artist->band ? 'yes' : 'no' }}"
                        photo_url="{{ $artist->photo_url }}"></edit-artist>
            </div>
        </div>
    </div>
@endsection
