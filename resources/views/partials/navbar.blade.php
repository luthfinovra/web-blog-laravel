<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-xl font-bold">BlogApp</div>
        <div class="hidden md:flex space-x-4">
            <a href="/" class="{{ Request::is('/') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Home</a>
            @auth
            <a href="/posts" class="{{ Request::is('posts') ? 'text-white' : 'text-gray-300 hover:text-white' }}">My Posts</a>
            <a href="/profile" class="{{ Request::is('about') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Profile</a>
            @endauth
            @auth
            <div class="relative">
                <button id="user-menu" class="text-gray-300 hover:text-white focus:outline-none flex items-center">
                    Welcome, {{ auth()->user()->name }}
                    <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
            @else
                <a href="/login" class="{{ Request::is('login') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Login</a>
            @endauth
        </div>
        <div class="md:hidden">
            <button id="nav-toggle" class="text-gray-300 focus:outline-none focus:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>
    <div id="nav-menu" class="md:hidden mt-2 hidden">
        <a href="/" class="{{ Request::is('/') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Home</a>
        @auth
            <a href="/posts" class="{{ Request::is('posts') ? 'text-white' : 'text-gray-300 hover:text-white' }}">My Posts</a>
            <a href="/profile" class="{{ Request::is('about') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Profile</a>
        @endauth
        @auth
        <div class="relative">
            <button id="mobile-user-menu" class="text-gray-300 hover:text-white focus:outline-none flex items-center">
                Welcome, {{ auth()->user()->name }}
                <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="mobile-dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
        @else
            <a href="/login" class="{{ Request::is('login') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Login</a>
        @endauth
    </div>
</nav>

<script>
    document.getElementById('nav-toggle').addEventListener('click', function() {
        const menu = document.getElementById('nav-menu');
        menu.classList.toggle('hidden');
    });

    document.getElementById('user-menu').addEventListener('click', function() {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.classList.toggle('hidden');
    });

    document.getElementById('mobile-user-menu').addEventListener('click', function() {
        const mobileDropdown = document.getElementById('mobile-dropdown-menu');
        mobileDropdown.classList.toggle('hidden');
    });
</script>
