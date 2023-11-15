<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Sports app') }}</title>

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
