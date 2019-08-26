@extends('layouts.layout')

  @section('content')
    <div class="container" id="movieBox" >
      <form method="get" action="{{ action('MovieController@saveMovie') }}">
          <p class="subtitle" >{{ $radnomMovie->title }}</p>
          {{ $radnomMovie->release_date }}
          {{ $radnomMovie->vote_average }}</div>
  <div class="" id="buttons">
    <button class="button is-success " id="button" class="btn-two green" type="submit"> Submit </button>
  </div>
      </form>

<button class="button is-danger" id="button" value="Refresh Page" onClick="window.location.reload();" >Try another one!</button>

  @endsection
