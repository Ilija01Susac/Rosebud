<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

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
    request()->validate([
      'username' =>'required|min:3|max:15|unique:users,username,'.$user_id,
      'email' => 'required|min:3|max:25|email|unique:users,email,'.$user_id
    ]);

    $user = User::find($user_id);
    $user->username = request('username');
    $user->email = request('email');
    $user->save();

    return redirect('/account/'.$user_id);
  }
  public function delete(){

  }

  public function editPassword($user_id){
    $user = User::find($user_id);
    return view('/account-editPassword', compact('user'));
  }

  public function updatePassword($user_id){
    request()->validate([
      'password' => 'required|min:5|string',
      'verify_password' => 'required|same:password'
    ]);

    $user = User::find($user_id);
    $user->password = Hash::make(request('password'));
    $user->save();

    return redirect('/account/'.$user_id);
  }



}
