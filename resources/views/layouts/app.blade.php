<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Sports app') }}</title>

  <!-- Include Alpine.js from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>


  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  <div id="app">
    <nav class="bg-white shadow-lg">
      <div class="container mx-auto">
        <div class="flex justify-between items-center py-4">
          <a class="text-2xl font-semibold text-blue-600" href="{{ url('/') }}">
            {{ config('app.name', 'Sports app') }}
          </a>

          <div class="hidden md:block">
            <ul class="space-x-4">
              <!-- Authentication Links -->
              @guest
                @if (Route::has('login'))
                  <li>
                    <a class="text-blue-600 hover:text-blue-800" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                @endif
                @if (Route::has('register'))
                  <li>
                    <a class="text-blue-600 hover:text-blue-800" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                @endif
              @else
                <div x-data="{ open: false }" class="flex">
                  <button @click="open = true" class=" text-blue font-semibold py-2 px-4">Filter by
                    date</button>
                  <div x-show="open" @click="open = false" class="fixed inset-0 bg-black opacity-50"></div>
                  <div x-show="open" class="fixed inset-0 flex items-center justify-center">
                    <div class="bg-white p-8 rounded-md">
                      <h2 class="text-2xl font-semibold mb-4">Filter by date</h2>
                      <div class="px-6 py-4">
                        <h2 class="text-xl font-semibold mb-4">Filter by Date</h2>
                        <form action="{{ route('posts.index') }}" method="GET">
                          @csrf
                          <div class="mt-4">
                            <label for="date" class="block font-semibold">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" class="w-full p-2 border rounded-md"
                              value="" required />
                          </div>
                          <div class="mt-4">
                            <label for="date" class="block font-semibold">End Date:</label>
                            <input type="date" name="end_date" id="end_date" class="w-full p-2 border rounded-md"
                              value="" required />
                          </div>
                          <div class="mt-4">
                            <button type="submit"
                              class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Filter
                            </button>
                            <a href="{{ route('posts.index') }}"
                              class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md no-underline">Clear
                              Filter</a>
                          </div>
                        </form>
                        <button @click="open = false"
                          class="mt-4 ml-2 bg-blue-500 text-white font-semibold py-2 px-6 rounded-md">Close</button>
                      </div>
                    </div>
                  </div>

                  <div class="flex">
                    <div class="mt-3 mr-2">
                      <div><a href="{{ route('weekly_averages') }}"
                          class=" text-black font-semibold py-2 px-4 rounded-md no-underline">View
                          Average Speed</a></div>
                    </div>
                    <div class="mt-3 mb-4 mr-2">
                      <a href="{{ route('posts.new') }}"
                        class=" text-black font-semibold py-2 px-4 rounded-md no-underline">New post</a>
                    </div>
                  </div>

                  <li class="relative group">

                    <button class="text-blue-600 group-hover:text-blue-800" @click="showMenu = !showMenu"
                      aria-haspopup="true">
                      {{ Auth::user()->name }}
                    </button>
                    <ul x-show="showMenu" @click.away="showMenu = false"
                      class="absolute space-y-1 bg-white border border-gray-200 text-gray-700 mt-2">
                      <li>
                        <a href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                          class="block px-4 py-2 hover:bg-blue-100">{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                          @csrf
                        </form>
                      </li>
                    </ul>
                  </li>
                @endguest
            </ul>
          </div>

          <button class="block md:hidden" id="mobile-menu-button">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>

</html>
