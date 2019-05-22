<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('assets')
</head>
<body class="w-100">
    <div id="app">
        @if(\Illuminate\Support\Facades\Auth::check())
            <header-component logged_in="true"></header-component>
        @else
            <header-component></header-component>
        @endif
        <div class="row" style="width: 100%;height: 100%;min-height: 90vh;margin-top:10vh;">
            @if(\Illuminate\Support\Facades\Auth::check())
                <sidebar user_name="{{ Auth::user()->name }}"
                         user_surname="{{Auth::user()->surname}}"
                         user_avatar_url="{{Auth::user()->avatar_url}}"
                         logged_in="true"></sidebar>
                <div class="col-9">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            @else
                <sidebar></sidebar>
                <div class="col-9">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            @endif

        </div>
    </div>
    @yield('scripts')
</body>
</html>
