<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/global.css') }}" rel="stylesheet">
    <title>Online Feedback Insight</title>
    @yield("styles")
  </head>
  <body>
    @include("components.header")
    @auth
      @include("auth.components.nav")
    @else
      @include("components.nav")
    @endauth
    @yield("main")
  </body>
</html>