@extends('layouts.app')

@section('content')
  <div class="container">
  <h1 class="title">Edit Account</h1>

  <form method="POST" action="/account/password/{{{$user->id}}}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="field">
      <label class="label" for="password">New Password</label>
      <div class="control">
        <input type="password" class="input" name="password" placeholder="New Password" >
      </div>
    </div>
</br>
    <div class="field">
      <label class="label" for="verify_password">Repeat new Password</label>
      <div class="control">
        <input type="password" class="input" name="verify_password" placeholder="Verify Password">
      </div>
    </div>

@if ($errors->any())
<div class="notification is-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li> {{ $error }} </li>
    @endforeach
  </ul>
</div>
@endif
</br>
    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Save new Password</button>
      </div>
    </div>
  </form>
</div>
@endsection
