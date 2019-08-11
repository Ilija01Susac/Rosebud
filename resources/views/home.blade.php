@extends('layouts.app')

@section('content')

<div class="selection">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form method="post" action="{{ action('MovieController@getMovie') }}">
            @csrf
            <div class="row">
            <div  class="col">
              <label for="quality">Quality of movie</label>
              <select name="quality" class="form-control form-control-lg" id="quality">
                <option value="gd">Good</option>
                <option value="bd">Mediocre</option>
                <option>Bad</option>
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
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
          </div>

          <input type="submit" class="btn btn-primary" value="Submit">
        </form>

        </div>
    </div>
</div>
@endsection
