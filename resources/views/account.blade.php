@extends('layouts.app')

@section('content')
  <h1>Account</h1>
  {{ Auth::user()->username }}
</br>
  {{ Auth::user()->email }}
@endsection
