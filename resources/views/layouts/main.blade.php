<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="/css/style.css">
    @vite('resources/css/app.css')
    <title>Blog | {{ $title }}</title>
    
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display:none;
      }
    </style>
</head>
<body>
    @include('partials/navbar')
      <div class="container mx-auto my-8    ">  
    @if (session()->has('error'))
      @include('partials.flash', ['type' => 'error', 'message' => session('error')])
    @endif

@if (session()->has('success'))
    @include('partials.flash', ['type' => 'success', 'message' => session('success')])
@endif
          @yield('container')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>