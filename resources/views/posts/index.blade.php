@extends('layouts.app')

@section('content')

  <div class="container mx-auto">
    <h2 class="text-3xl font-semibold mb-4 text-center">Sports app</h2>

    <!-- Your modal button and content -->
    <div x-data="{ open: false }">
      <!-- Button to open the modal -->
      <button @click="open = true" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Filter by date</button>

      <!-- Modal overlay -->
      <div x-show="open" @click="open = false" class="fixed inset-0 bg-black opacity-50"></div>

      <!-- Modal content -->
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
                <input type="date" name="end_date" id="end_date" class="w-full p-2 border rounded-md" value=""
                  required />
              </div>
              <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Filter
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




      <div class="py-4">
        <div><a href="{{ route('weekly_averages') }}"
            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md no-underline">View
            Average Speed</a></div>
      </div>
      <div class="py-2 mb-4">
        <a href="{{ route('posts.new') }}"
          class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md no-underline">New post</a>
      </div>

      {{-- <div class="text-center mt-8">
        <a href="{{ route('posts.new') }}"
           class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md no-underline">New post</a>
    </div> --}}

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

        @foreach ($posts as $post)
          <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
              <p class="text-xl mb-2">Date: {{ $post->date }}</p>
              <p class="text-xl mb-2">Time: {{ $post->time_minutes }} min</p>
              <p class="text-xl mb-2">Distance: {{ $post->distance }} km</p>
              <p class="text-xl mb-2">Speed: {{ round($post->distance / ($post->time_minutes / 60), 2) }} km/h</p>
              <p class="text-xl mb-2">Posted: {{ $post->created_at->diffForHumans() }}</p>
            </div>
            <div class="px-6 py-4 flex justify-between">
              <a href="{{ route('posts.edit', $post) }}"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md no-underline">Edit</a>

              <form action="{{ route('posts.destroy', $post) }}" method="POST"
                onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md">Delete
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>


    </div>
  @endsection
