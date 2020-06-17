<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <header-component csrftoken="{{csrf_token()}}" href-logout="{{ route('logout') }}" user-name="{{ Auth::user()->name }} "></header-component>
    <div class="container">
      @if (isset($employee))
      <employee-form :employee-input="{{$employee}}"></employee-form>
      @else
      <employee-form></employee-form>
      @endif
    </div>
  </div>
</body>

</html>