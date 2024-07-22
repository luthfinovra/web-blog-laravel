@extends('layouts/main')

@section('container')    
<div class="space-y-4">

    <h1 class="text-3xl font-bold">Profile</h1>
    <h2>Welcome Back! <b>{{ auth()->user()->name }}</b> </h2>
    <ul>
        <li><b>Email:</b> {{ auth()->user()->email }}</li>
        <li><b>Username:</b> {{ auth()->user()->username }}</li>
    </ul>
    <img src="img/luthfinovra.jpg" alt="luthfinovra.jpg" width="100" class="rounded-full">
</div>
@endsection