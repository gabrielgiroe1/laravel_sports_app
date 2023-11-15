@extends('layouts.app')

@section('content')
  <div class="d-flex ">
    <div class="container w-3/2 mx-auto flex flex-row justify-center item-center">
      <div class="card text-center pt-5 w-96">
        <div class="card-body text-center">
          <h2 class="text-3xl font-semibold mb-4">Sports app</h2>
          <div><a href="{{ route('weekly_averages') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md no-underline">Average
              speed</a>
          </div>
          <h3 class="text-3xl font-semibold mt-4">Filter by date:</h1>
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
                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Filter</button>
                <a href="{{ route('posts.index') }}" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md no-underline">Clear
                  Filter</a>
              </div>
            </form>
            <h2 class="text-xl pt-4 mt-4 font-semibold">List of Posts</h2>
            <hr>
            <div class=" mt-4">
              @foreach ($posts as $post)
                <div>
                  <p class="py-2 px-4">Date: {{ $post->date }}</p>
                  <p class="py-2 px-4">Time: {{ $post->time_minutes }} min</p>
                  <p class="py-2 px-4">Distance: {{ $post->distance }} km</p>
                  <p class="py-2 px-4">Speed: {{ round($post->distance / ($post->time_minutes / 60), 2) }} km/h</p>
                  <p class="py-2 px-4">Posted: {{ $post->created_at->diffForHumans() }}</p>
                  <p><a href="{{ route('posts.edit', $post) }}"
                      class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md no-underline">Edit</a>
                  </p>
                  <div class="py-2 px-4">
                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Are you sure?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md">Detete</button>
                    </form>
                  </div>
                </div>
                <hr>
              @endforeach
              </tbody>
            </div>
            <div><a href="{{ route('posts.new') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md no-underline">New
                post</a>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
