<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;

class WatchlistController extends Controller
{
    public function show(){
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      return view('watchlist')->with('movies', $user->movies);
    }
    public function delete(){

    }
}
