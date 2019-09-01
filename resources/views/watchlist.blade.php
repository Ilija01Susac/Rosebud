@extends('layouts.layout')
  @section('content')
    <h1 class="title">Watchlist</h1>

    @foreach ($movies as $movie)
      <hr>
      {{ $movie->title }}
    <form method="post" action="/watchlist/{{ $movie->id }}">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <button type="submit" class="button is-danger">Delete movie</button>
    </form>
    @endforeach

  @endsection
