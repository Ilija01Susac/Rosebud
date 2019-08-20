@extends('layouts.app')

  @section('content')
    <form method="get" action="{{ action('MovieController@saveMovie') }}">
  {{ $radnomMovie->title }}
  {{ $radnomMovie->release_date }}
  {{ $radnomMovie->vote_average }}
  <button type="submit"> Submit </button>

  </form>
    <button value="Refresh Page" onClick="window.location.reload();" >Try another one!</button>
  @endsection
