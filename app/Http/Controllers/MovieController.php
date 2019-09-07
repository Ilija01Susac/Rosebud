<?php

namespace App\Http\Controllers;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Http\Request;
use Session;
use App\Movie;
use App\Genre;
use App\User;
use Redirect;

class MovieController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }


  public function getData($link){

      $curl = curl_init();

      curl_setopt_array($curl, array(
    //    CURLOPT_URL => "https://api.themoviedb.org/3/movie/popular?api_key=a0744e299206697fb6f98e07344c50f5&language=en-US&page=1",
        CURLOPT_URL => $link,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "{}",
      ));

      $data = json_decode(curl_exec($curl));
      $err = curl_error($curl);
      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $data;
      }
  }

    public function getMovie(Request $request){
      $watchlistSize = $this->limitWatchlist();
      if($watchlistSize >= 5){ return redirect()->route('home')->withErrors(['Limit', 'You reached watchlist limit of 5 movies.']); }
      $yearLimits = $this->getYear($request->year);
      $voteAverage = $this->getVoteAverage($request->quality);

      $API = 'a0744e299206697fb6f98e07344c50f5';
      $lang = ''; //'&language=en-US';
      $sort = '&sort_by=popularity.desc';
      $adult = '&include_adult=false';
      $page = '&page=1';
      $date = '&primary_release_date.gte='.$yearLimits['from'].'-01-01&primary_release_date.lte='.$yearLimits['to'].'-12-31';
      $vote = '&vote_average.gte='.$voteAverage['from'].'&vote_average-lte='.$voteAverage['to'];
      $genre = '&with_genres='.$request->genre;

      $link = "https://api.themoviedb.org/3/discover/movie?api_key=".$API.$lang.$sort.$adult.$page.$date.$vote.$genre;

      $movie = $this->getData($link);

      if(empty($movie->results)){
        return redirect()->route('home')->withErrors(['No result', 'There are no movies by criteria you searched.']);
      }

      $randomNumber = rand( 1, $movie->total_pages);
      $randomPage = '&page='.$randomNumber;
      $newLink = "https://api.themoviedb.org/3/discover/movie?api_key=".$API.$lang.$sort.$adult.$randomPage.$date.$vote.$genre;
      $randomMovieList = $this->getData($newLink);

      $arraySize = count($randomMovieList->results);
      $randomNumberMovie = rand(0, $arraySize-1);
      $randomMovie = $randomMovieList->results[$randomNumberMovie];


      $this->saveInSession($randomMovie);
      $genreNames = $this->getGenres($randomMovie->genre_ids);
      $crew = $this->getMovieCredits($randomMovie->id, $API);
      return view('movie', compact('randomMovie', 'genreNames', 'crew'));
    }

    public function saveMovie(){
      $inWatchlist = $this->inWatchlist(Session::get('id'));
      if($inWatchlist){
        return redirect()->route('home')->withErrors(['Already in watchlist', 'Movie you selected is already in your watchlist.']);
      }
      $Movie = new Movie();
      $Movie->movie_id= Session::get('id');
      $Movie->title= Session::get('title');
      $Movie->vote_average= Session::get('vote_average');
      $Movie->vote_count= Session::get('vote_count');
      $Movie->original_title= Session::get('original_title');
      $Movie->overview= Session::get('overview');
      $Movie->release_date= Session::get('release_date');
      if(Session::get('poster_path') == null){
        $Movie->poster_path= '';
      }else{ $Movie->poster_path= Session::get('poster_path');  }
      $Movie->primary_genre= Session::get('primary_genre');
      $Movie->secondary_genre= Session::get('secondary_genre');
      $Movie->user_id = auth()->user()->id;
      $Movie->save();

      return redirect()->route('watchlist');
    }

    public function getFreshMovies(){
      $link = "https://api.themoviedb.org/3/movie/popular?api_key=a0744e299206697fb6f98e07344c50f5&language=en-US&page=1";
      $freshMovies = $this->getData($link);
      return view('freshMovies', compact('freshMovies'));
    }


    public function getYear($year){
      switch ($year) {
    case "90s":
        $date['from'] = 1900;
        $date['to'] = 1939;
        break;
    case "94s":
        $date['from'] = 1940;
        $date['to'] = 1959;
        break;
    case "96s":
        $date['from'] = 1960;
        $date['to'] = 1969;
        break;
    case "97s":
        $date['from'] = 1970;
        $date['to'] = 1979;
        break;
    case "80s":
        $date['from'] = 1980;
        $date['to'] = 1989;
        break;
    case "99s":
        $date['from'] = 1990;
        $date['to'] = 1999;
        break;
    case "20s":
        $date['from'] = 2000;
        $date['to'] = date('Y');
        break;
    default:
        $date['from'] = 1960;
        $date['to'] = date('Y');
        ;
      }
    return $date;
    }

    public function getVoteAverage($quality){
      switch ($quality) {
        case "Good":
          $voteAverage = array("from" => 7.5,"to" => 10);
          break;
        case "Mediocre":
          $voteAverage = array("from" => 5,"to" => 7.5);
          break;
        case "Bad":
          $voteAverage = array("from" => 1,"to" => 5);
          break;
        default:
          $voteAverage = array("from" => 6,"to" => 9.5);

      }
      return $voteAverage;
    }

    public function saveInSession($randomMovie){
      Session::put('title', $randomMovie->title);
      Session::put('id', $randomMovie->id);
      Session::put('vote_average', $randomMovie->vote_average);
      Session::put('vote_count', $randomMovie->vote_count);
      Session::put('original_title', $randomMovie->original_title);
      Session::put('overview', $randomMovie->overview);
      Session::put('release_date', $randomMovie->release_date);
      Session::put('poster_path', $randomMovie->poster_path);
      Session::put('primary_genre', $randomMovie->genre_ids[0]);
      if(!empty($randomMovie->genre_ids[1])){
        Session::put('secondary_genre', $randomMovie->genre_ids[1]);
      }else{
        Session::put('secondary_genre', 0);
    }
    }

    public function getGenres($genre_ids){
      $genre['primary'] = \DB::table('genres')->where('id', $genre_ids[0])->pluck('genre_name');
      if(!empty($genre_ids[1])){
        $genre['secondary'] = \DB::table('genres')->where('id', $genre_ids[1])->pluck('genre_name');
      }else{
        $genre['secondary'] = array(' ');
      }
      return $genre;
    }

    public function getMovieCredits($movie_id, $API){
      $link = "https://api.themoviedb.org/3/movie/".$movie_id."/credits?api_key=".$API;
      $credits = $this->getData($link);
      $directors = $this->getDirector($credits);
      $actors = $this->getActors($credits);
      $cast = ['Directors'=> $directors, 'Actors' => $actors];
      return $cast;
    }


    public function getDirector($credits){
      $directors= array();
      foreach ($credits->crew as $crewMember) {
        if($crewMember->job == "Director"){
          $directors[] = $crewMember;
        }
      }return $directors;
    }

    public function getActors($credits){
      $actors = array();
      foreach ($credits->cast as $actor) {
          $actors[] = $actor;
      } return $actors;
    }

    public function limitWatchlist(){
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      $watchlistSize = count($user->movies);
      return $watchlistSize;
    }

    public function inWatchlist($movie_id){
      $user_id = auth()->user()->id;
      $savedMovie = \DB::table('movies')->where([['user_id','=' ,$user_id] , ['movie_id', '=',$movie_id]])->get();
      if(count($savedMovie) == 1){ return true; }else{ return false; }
    }
}
