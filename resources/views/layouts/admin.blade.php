<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="{{ asset('public/css/bootstrap.css') }}" rel="stylesheet">

  <!-- Less -->
  <link href="{{ asset('public/css/estilosAdmin.less') }}" rel="stylesheet/less" type="text/css">
  <link href="{{ asset('public/css/estilosSidebarCollapse.less') }}" rel="stylesheet/less" type="text/css">
  <script src="{{ asset('public/css/less.min.js') }}" type="text/javascript"></script>
</head>
<body>
  <div id="app">
    @include('layouts.sidebars.sidebarCollapse')

    <div id="main" class="full-width">
      <div class="header-admin text-center-vertical">
        <h2 class="text-center no-margin-top">@yield('titulo')</h2>
      </div>

      @yield('content')
    </div>

  </div>

  <!-- Scripts -->
  <script src="{{ asset('public/js/app.js') }}"></script>
  <script src="{{ asset('public/js/navbarCollapse.js') }}"></script>
</body>
</html>
