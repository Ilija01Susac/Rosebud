<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $genreData = \App\Genre::all();
      $genreItems = json_decode($genreData);
      return view('home')->with('genreItems', $genreItems);
    }
}
