<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
  public function __construct()
  {
    //  $this->middleware('auth');
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

      $freshMovies = json_decode(curl_exec($curl));
      $err = curl_error($curl);
      dd($freshMovies);
      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $freshMovies;
      }
  }

    public function getMovie(){
      $API = 'a0744e299206697fb6f98e07344c50f5';
      $lang =  '&language=en-US';
      $sort = '&sort_by=popularity.desc';
      $adult = '&include_adult=false';
      $page = '&page=1';
      $date = '&primary_release_date.gte=1990-01-01&primary_release_date.lte=1999-12-31';
      $vote = '&vote_average.gte=6';
      $genre = '&with_genres=28';

      $link = "https://api.themoviedb.org/3/discover/movie?api_key=".$API.$lang.$sort.$adult.$page.$date.$vote.$genre;

      $movie = $this->getData($link);
      return view('movie', compact('movie'));
    }

    public function getFreshMovies(){
      $link = "https://api.themoviedb.org/3/movie/popular?api_key=a0744e299206697fb6f98e07344c50f5&language=en-US&page=1";

      $movie = $this->getData($link);
        return view('freshMovies', compact('freshMovies'));
    }
}
