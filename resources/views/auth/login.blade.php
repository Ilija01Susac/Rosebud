<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rosebud') }} - Login</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script>
    $( document ).ready(function() {
     $('.message a').click(function(){
         $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
      });});
    </script>

    <link href="{{ asset('css/login-style.css') }}" rel="stylesheet">
</head>
<body>
  <div class="login-page">
    <h1 class="loginTitle">ROSEBUD</h1>
  <div class="form">
    <form method="POST" action="{{ route('register') }}" class="register-form"> @csrf
      <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
      <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      <button type="submit" class="btn btn-primary">
          {{ __('Register') }}
      </button>
      @if ($errors->has('username'))
        <p>Registration failed!</p>
      @endif
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>

    <form class="login-form" method="POST" action="{{ route('login') }}">
      @csrf
          <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

          <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          <button type="submit" class="btn btn-primary">
              {{ __('Login') }}
          </button>
          @if ($errors->has('password') || $errors->has('username') )
            <p>Login failed!</p>
          @endif
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
</body>
