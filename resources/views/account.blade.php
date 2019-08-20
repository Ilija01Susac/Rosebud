@extends('layouts.app')

@section('content')
  <h1 class="title">Account</h1>
  {{$user->username}}
</br>
  {{ $user->email }}

  <button type='button' onclick="window.location='{{ route('accountEdit', auth()->user()->id) }}'">Edit</button>
@endsection
