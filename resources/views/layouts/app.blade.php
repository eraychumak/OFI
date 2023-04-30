<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Online Feedback Insight</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-weight: normal;
      }

      html, body {
        height: 100%;
        width: 100%;
      }

      body {
        padding: 5vh 5vw;
      }

      header {
        margin-bottom: 3vh;
      }

      label {
        display: block;
      }

      .important {
        color: red;
      }

    </style>
    @yield("styles")
  </head>
  <body>
    @include("components.header")
    @yield("main")
  </body>
</html>