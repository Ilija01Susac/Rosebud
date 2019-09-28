<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;
use App\Genre;
use Session;

class WatchlistController extends Controller
{
    public function show(){

      $user_id = auth()->user()->id;
      $user = User::find($user_id);

      $movies = $user->movies;
    //  $genres = $this->getGenres($movie->primary_genre, $movie->secondary_genre);
    //  $credits = $this->getMovieCredits($movie->movie_id, $API);


      return view('watchlist')->with('movies', $user->movies);
    }

    public function destroy($movie_id){
      \DB::table('movies')->where('id', '=', $movie_id)->delete();
      Session::flash('message', 'Successfully deleted the movie!');
      return redirect()->route('watchlist');
    }


    public function getGenres($primary, $secondary){
      $genre['primary'] = \DB::table('genres')->where('id', $primary)->pluck('genre_name');
      if(!empty($secondary)){
        $genre['secondary'] = \DB::table('genres')->where('id', $secondary)->pluck('genre_name');
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
        }else{
          $directors[] = '';
        }
      }return $directors;
    }

    public function getActors($credits){
      $actors = array();
      foreach ($credits->cast as $actor) {
          $actors[] = $actor;
      } return $actors;
    }


    public function getData($link){

        $curl = curl_init();

        curl_setopt_array($curl, array(
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

}
