<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;
use Session;

class WatchlistController extends Controller
{
    public function show(){
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      return view('watchlist')->with('movies', $user->movies);
    }

    public function destroy($movie_id){
      \DB::table('movies')->where('id', '=', $movie_id)->delete();
      Session::flash('message', 'Successfully deleted the movie!');
      return redirect()->route('watchlist');
    }
}
