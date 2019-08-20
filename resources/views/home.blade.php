@extends('layouts.app')

@section('content')

  <section class="hero is-dark is-bold  is-fullheight-with-navbar">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
      <nav class="navbar">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item">
              <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
            </a>
            <span class="navbar-burger burger" data-target="navbarMenuHeroA">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
          <div id="navbarMenuHeroA" class="navbar-menu">
            <div class="navbar-end">
              <a class="navbar-item">
                Home
              </a>
              <a class="navbar-item">
                Examples
              </a>
              <a class="navbar-item">
                Documentation
              </a>
              <span class="navbar-item">
                <a class="button is-primary is-inverted">
                  <span class="icon">
                    <i class="fab fa-github"></i>
                  </span>
                  <span>Download</span>
                </a>
              </span>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title">
          Title
        </h1>
        <h2 class="subtitle">
          Subtitle
        </h2>
      </div>
    </div>












<!--
<div class="selection">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form method="POST" action="{{ action('MovieController@getMovie') }}">
            @csrf
            <div class="row">
            <div  class="col">
              <label for="quality">Quality of movie</label>
              <select name="quality" class="form-control form-control-lg" id="quality">
                <option value="Good">Good</option>
                <option value="Mediocre">Mediocre</option>
                <option value="Bad">Bad</option>
              </select>
            </div>

            <div class="col">
              <label for="Genre">Genre of movie</label>
              <select name="genre" class="form-control form-control-lg" id="genre">
                @foreach ($genreItems as $genre)
                  <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col">
              <label for="year">Release year</label>
              <select name="year" class="form-control form-control-lg" id="year">
                <option value="90s">1900 - 1939</option>
                <option value="94s">1940 - 1959</option>
                <option value="96s">1960 - 1969</option>
                <option value="97s">1970 - 1979</option>
                <option value="80s">1980 - 1989</option>
                <option value="99s">1990 - 1999</option>
                <option value="20s">2000 - today</option>
              </select>
            </div>
          </div>

          <input type="submit" class="btn btn-primary" value="Submit">
        </form>

        </div>
    </div>
</div>
-->
@endsection
