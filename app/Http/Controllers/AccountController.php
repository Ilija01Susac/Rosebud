<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show($user_id){
    $user = User::find($user_id);
    return view('/account', compact('user'));
  }
  public function edit($user_id){
    $user = User::find($user_id);
    return view('/account-edit', compact('user'));
  }

  public function update($user_id){
    $user = User::find($user_id);

    $user->username = request('username');
    $user->email = request('email');
    $user->save();

    return redirect('/account/'.$user_id);
  }
  public function delete(){

  }
}
