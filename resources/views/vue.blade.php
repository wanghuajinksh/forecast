<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
        <link rel="icon" href="{{asset('img/app_icon-9df2cc9fdd.png')}}">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                padding: 0;
                margin: 0;
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">      
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">      
          
    </head>
    <body>
        <input type="hidden" id="base_url" value="{{asset('/')}}">
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
