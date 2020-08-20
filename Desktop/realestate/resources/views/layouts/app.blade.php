<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{-- TODO: set app name --}}
    <title>{{ config('app.name', 'The Real Estate App') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('./js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('./css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: red">
    <div id="app">
        <main-view>
            <template v-slot:navbar>
                @include('layouts.head')
            </template>
            <template v-slot:default>
                @yield('content')
            </template>
    </main-view>
    </div>
</body>
</html>
