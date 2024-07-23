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
    <title>Blog | {{ Request::is('login') ? 'Please Login': 'Please Sign Up' }}</title>
</head>
<body>
      <div class="h-full items-center">  
          @yield('container')
      </div>
          {{-- <script src="js/test.js"></script> --}}
          <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>