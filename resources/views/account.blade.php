@extends('layouts.layout')

@section('content')
  <div class="container">
    <h1 class="title">Account</h1>
  <p class="accountInfo"><b>Username:</b> {{$user->username}}</p>
  </br>
  <p class="accountInfo"><b>Email:</b> {{ $user->email }}</p>
  </br>
    <button class="button is-outlined is-normal" type='button' onclick="window.location='{{ route('accountEdit', auth()->user()->id) }}'">Edit</button>

</div>
@endsection
