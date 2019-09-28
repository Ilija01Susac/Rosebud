@extends('layouts.layout')
  @section('content')
    <h1 class="title">Watchlist</h1>
    <h1 class="subtitle">Movies: {{ count($movies) }} of 5</h1>


    @foreach ($movies as $movie)

      <div class="movieImage">
        @if (!$movie->poster_path)
          <img src="https://www.colombogioiellieri.it/wp-content/uploads/2018/06/no_image_available.jpg" alt="Moviephoto" width="150" >
        @else
        <img src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}" alt="Moviephoto" width="150" height="150">
      @endif
        </div>
    <div class="watchlistDetails">
    <p class="title"> {{ $movie->title }} </p>
    <p><b>Release date:</b>  {{ $movie->release_date }}</p>
    <p><b>Average vote:</b>  {{ $movie->vote_average }}</p>
    <p><b>Overview:</b>  {{ $movie->overview }}</p>

    <form method="post" action="/watchlist/{{ $movie->id }}">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <button type="submit"  id="button" class="button is-danger">Delete movie</button>
    </form>
    </div>
    <hr>
    @endforeach
  @endsection
