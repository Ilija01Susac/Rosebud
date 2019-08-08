<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['id', 'genre_name'];
    protected $table = 'genres';
    public $timestamps = false;
}
