@extends('layouts.layout')

@section('content')
    <!-- Hero content: will be in the middle -->
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                <form method="POST" action="{{ action('MovieController@getMovie') }}">
                  @csrf
                  <div class="columns">
                  <div  class="column is-one-third">
                    <label for="quality" >Quality of movie</label>
                    <div class="select is-large is-fullwidth">
                    <select name="quality" class="form-control form-control-lg" id="quality">
                      <option value="Good">Good</option>
                      <option value="Mediocre">Mediocre</option>
                      <option value="Bad">Bad</option>
                    </select>
                  </div>
                  </div>

                  <div class="column is-one-third">
                    <label for="Genre">Genre of movie</label>
                    <div class="select is-large is-fullwidth">
                    <select name="genre" class="form-control form-control-lg" id="genre">
                      @foreach ($genreItems as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  </div>

                  <div class="column is-one-third">
                    <label for="year">Release year</label>
                    <div class="select is-large is-fullwidth">
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
                </div>

                <input type="submit" class="button is-danger is-inverted is-fullwidth is-large " value="Submit">
              </form>
              <br>
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                  @endforeach
                </ul>
              </div>
              @endif
              </div>
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
