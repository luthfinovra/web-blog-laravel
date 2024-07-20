@extends('layouts/main')

@section('container')    
<h1 class="text-3xl font-bold">About Page</h1>
<h2>Welcome Back! {{ $name }} </h2>
<p>Email {{ $email }}</p>
<img src="img/{{ $image }}" alt="{{ $image }}" width="100" class="rounded-full">
@endsection