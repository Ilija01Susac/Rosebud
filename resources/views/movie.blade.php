@extends('layouts.layout')

  @section('content')
    <div class="movieImage">
      @if (!$randomMovie->poster_path)
        <img src="https://www.colombogioiellieri.it/wp-content/uploads/2018/06/no_image_available.jpg" alt="Moviephoto" width="250" >
      @else
      <img src="https://image.tmdb.org/t/p/w500{{ $randomMovie->poster_path }}" alt="Moviephoto" width="250" height="370">
    @endif
    </div>
    <div class="movieDetails" >
      <form method="get" action="{{ action('MovieController@saveMovie') }}">
          <p class="title" >{{ $randomMovie->title }}</p>
          <p><b>Release date:</b>  {{ $randomMovie->release_date }}</p>
          <p><b>Average vote:</b>  {{ $randomMovie->vote_average }}</p>
          <p><b>Language:</b>  {{ $randomMovie->original_language }}</p>
          @if ($randomMovie->original_language != 'en')
            <p><b>Original title:</b>  {{ $randomMovie->original_title }}</p>
          @endif
          <p><b>Genres:</b>  {{ $genreNames['primary'][0] }} , {{$genreNames['secondary'][0]}}</p>
          <p><b>Overview:</b>  {{ $randomMovie->overview }}</p>
          <p><b>Director:</b>
            @if (count($crew['Directors']) == 1)
              {{ $crew['Directors'][0]->name }}
            @else
              @foreach ($crew['Directors'] as $director)
                {{ $director->name }} |
              @endforeach
            @endif </p>
          <p><b>Actors:</b>
            @if (!empty($crew['Actors']))
            @if (count($crew['Actors']) >=3)
                @for ($i=0; $i < 3; $i++)
                {{ $crew['Actors'][$i]->name }} @if ($crew['Actors'][$i]->character != "")
                  as {{ $crew['Actors'][$i]->character }}
                @endif |
              @endfor
            @else
              {{ $crew['Actors'][0]->name }} @if ($crew['Actors'][0]->character != "")
                as {{ $crew['Actors'][0]->character }}
              @endif
            @endif
        @else
          No actors data.
      @endif</p>
        
        <button class="button is-success " id="button" class="btn-two green" type="submit"> Save movie </button>
        <div class="button is-danger" id="button" value="Refresh Page" onClick="window.location.reload();">Try another one</div>
      </div>
      </form>

  @endsection
