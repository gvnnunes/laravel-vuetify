<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}?v={{ config('version.app') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}?v={{ config('version.app') }}" defer></script>
    <script src="{{ asset('js/main.js') }}?v={{ config('version.app') }}"></script>
    <title>Anime | Laravel Vuetify</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}?v={{ config('version.app') }}" type="image/x-icon">
  </head>
  <body>
    @inertia
  </body>
</html>
