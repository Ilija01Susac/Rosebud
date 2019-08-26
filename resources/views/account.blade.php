@extends('layouts.layout')

@section('content')
  <div class="container">
  <h1 class="title">Account</h1>
  {{$user->username}}
</br>
  {{ $user->email }}
</br>
  <button type='button' onclick="window.location='{{ route('accountEdit', auth()->user()->id) }}'">Edit</button>
</div>
@endsection
