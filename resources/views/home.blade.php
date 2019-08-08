@extends('layouts.app')

@section('content')

<div class="selection">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="row">
            <div  class="col">
              <label for="exampleFormControlSelect1">Quality of movie</label>
              <select class="form-control form-control-lg" id="quality">
                <option>Good</option>
                <option>Mediocre</option>
                <option>Bad</option>
              </select>
            </div>

            <div class="col">
              <label for="exampleFormControlSelect1">Type of movie</label>
              <select class="form-control form-control-lg" id="type">
                @foreach ($genreItems as $genre)
                  <option>{{ $genre->genre_name }}</option>
                @endforeach
              </select>
            </div>

            <div  class="col">
              <label for="exampleFormControlSelect1">Release year</label>
              <select class="form-control form-control-lg" id="year">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection
