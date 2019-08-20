@extends('layouts.app')

@section('content')
  <h1 class="title">Edit Account</h1>

  <form method="POST" action="/account/{{{$user->id}}}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="field">
      <label class="label" for="username">Username</label>
      <div class="control">
        <input type="text" class="input" name="username" placeholder="Username" value="{{ $user->username }}">
      </div>
    </div>
</br>
    <div class="field">
      <label class="label" for="email">Email</label>
      <div class="control">
        <input type="text" class="input" name="email" placeholder="Email" value="{{ $user->email }}">
      </div>
    </div>


</br>
    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Edit account data</button>
      </div>
    </div>
  </form>

@endsection
