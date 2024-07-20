<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-xl font-bold">MyBlog</div>
        <div class="hidden md:flex space-x-4">
            <a href="/" class="{{ Request::is('/') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Home</a>
            <a href="/posts" class="{{ Request::is('posts') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Blog</a>
            <a href="/about" class="{{ Request::is('about') ? 'text-white' : 'text-gray-300 hover:text-white' }}">About</a>
            <a href="/contact" class="{{ Request::is('contact') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Contact</a>
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
        <a href="/posts" class="{{ Request::is('posts') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Blog</a>
        <a href="/about" class="{{ Request::is('about') ? 'text-white' : 'text-gray-300 hover:text-white' }}">About</a>
        <a href="/contact" class="{{ Request::is('contact') ? 'text-white' : 'text-gray-300 hover:text-white' }}">Contact</a>
    </div>
</nav>