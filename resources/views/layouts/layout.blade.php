<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rosebud') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
</head>
<body>

    <section class="hero is-dark is-bold  is-fullheight">
      <!-- Hero head: will stick at the top -->
      <div class="hero-head">
        <nav class="navbar">
          <div class="container">
            <div class="navbar-brand">
              <a class="navbar-item" href="/">
                <img src="{{asset('img/logo-8.png')}}" alt="Logo">
              </a>
              <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </div>
            <div id="navbarMenuHeroA" class="navbar-menu">
              <div class="navbar-end">
                <a class="navbar-item {{ (request()->is('account*')) ? 'is-active' : '' }}" href="{{ route('account', auth()->user()->id) }}">
                  {{ Auth::user()->username }}
                </a>
                <a class="navbar-item {{ (request()->is('watchlist*')) ? 'is-active' : '' }}" href="/watchlist">
                  {{ __('Watchlist') }}
                </a>
                <span class="navbar-item">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  <a class="button is-outlined" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                </span>
              </div>
            </div>
          </div>
        </nav>
      </div>
<main class="hero-body">
  <div id="app" class="container">
  @yield('content')
</div>
</main>
</section>
</body>
