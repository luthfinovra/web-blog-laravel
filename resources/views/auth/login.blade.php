@extends('auth/layouts/main')

@section('container')
@if (session()->has('error'))
    @include('partials.flash', ['type' => 'error', 'message' => session('error')])
@endif

@if (session()->has('success'))
    @include('partials.flash', ['type' => 'success', 'message' => session('success')])
@endif   
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="/login" method="POST">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-800 sm:text-sm sm:leading-6">
          </div>
          @error('email')
          <div class="text-sm">
              <span href="#" class="font-semibold text-red-500">{{ $message }}</span>
            </div>
          @enderror
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            {{-- <div class="text-sm">
              <a href="#" class="font-semibold text-gray-800 hover:text-gray-600">Forgot password?</a>
            </div> --}}
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-800 sm:text-sm sm:leading-6">
          </div>
          @error('password')
          <div class="text-sm">
              <span href="#" class="font-semibold text-red-500">{{ $message }}</span>
            </div>
          @enderror
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-800">Sign in</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500">
        Did not have account?
        <a href="/register" class="font-semibold leading-6 text-gray-800 hover:text-gray-600">Register</a>
      </p>
    </div>
  </div>

@endsection