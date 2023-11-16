@extends('layouts.app')

@section('content')
  <div class="container mx-auto">
    <h2 class="text-3xl font-semibold mb-4 text-center">Sports app</h2>
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

            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
