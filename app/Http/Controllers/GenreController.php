<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;


class GenreController extends Controller
{

    public function getData(){
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/genre/movie/list?api_key=a0744e299206697fb6f98e07344c50f5&language=en-US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
          ));
          $data = json_decode(curl_exec($curl));
          curl_close($curl);

          return $data;
    }

    public function store(Request $request){
          $genres = $this->getData();

          foreach ($genres->genres as $key => $genre) {
            $Genre= new Genre();
            $Genre->id= $genre->id;
            $Genre->genre_name= $genre->name;
            $Genre->save();
          }
        return redirect('/genres');
   }


    public function show(){
      return $genres = \App\Genre::all();
    }

    public function delete(){
        \DB::delete('delete from genres');
        return redirect('/');
      }

    }
