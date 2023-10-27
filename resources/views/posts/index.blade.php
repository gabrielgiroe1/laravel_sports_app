@extends('layouts.app')

@section('content')
  <div class="bg-white p-6 rounded-lg shadow-md">
    <div class="text-center">Filter by date:</div>
    <form action="{{ route('posts.index') }}" method="GET">
        @csrf
        <div class="mt-4">
            <label for="date" class="block font-semibold">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="w-full p-2 border rounded-md" value="" required />
        </div>

        <div class="mt-4">
            <label for="date" class="block font-semibold">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="w-full p-2 border rounded-md" value="" required />
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Filter</button>
            <a href="{{ route('posts.index') }}" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md">Clear Filter</a>
        </div>
    </form>
    <h2 class="text-xl font-semibold">List of Posts</h2>
    <table class="w-full mt-4">
      <thead>
        <tr>
          <th class="py-2 px-4">Date</th>
          <th class="py-2 px-4">Distance (km)</th>
          <th class="py-2 px-4">Time (minutes)</th>
          <th class="py-2 px-4">Edit</th>
          <th class="py-2 px-4">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td class="py-2 px-4">{{ $post->date }}</td>
            <td class="py-2 px-4">{{ $post->distance }}</td>
            <td class="py-2 px-4">{{ $post->time_minutes }}</td>
            <td><a href="{{ route('posts.edit', $post) }}"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Edit</a>
            </td>
            <td class="py-2 px-4">
              <form action="{{ route('posts.destroy', $post) }}" method="POST"
                onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md">Detete</button>
              </form>
            </td>

          </tr>
        @endforeach
      </tbody>

    </table>
    <hr>
    <div><a href="{{ route('posts.new') }}"
        class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">New post</a>
    </div>
  </div>
@endsection
