<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    @vite('resources/css/app.css')
    <title>My Blog | {{ $title }}</title>
</head>
<body>
    @include('partials/navbar')
      <div class="container mx-auto my-8    ">  
          @yield('container')
        </div>
        <script>
            document.getElementById('nav-toggle').addEventListener('click', function() {
              const menu = document.getElementById('nav-menu');
              menu.classList.toggle('hidden');
            });
          </script>
          {{-- <script src="js/test.js"></script> --}}
</body>
</html>