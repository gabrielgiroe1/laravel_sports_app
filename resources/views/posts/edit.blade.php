@extends('layouts.app')
@section('content')
  <div class="d-flex ">
    <div class="container w-3/2 mx-auto flex flex-row justify-center item-center">
      <div class="card text-center pt-5 w-96">
        <div class="card-body text-center">
          <h2 class="text-xl font-semibold">Edit this post</h2>
          <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4">
              <label for="date" class="block font-semibold">Date:</label>
              <input type="date" name="date" id="date" class="w-full p-2 border rounded-md"
                value="{{ $post->date }}" required />
            </div>

            <div class="mt-4">
              <label for="distance" class="block font-semibold">Distance (km):</label>
              <input type="number" name="distance" id="distance" class="w-full p-2 border rounded-md"
                value="{{ $post->distance }}" required />
            </div>

            <div class="mt-4">
              <label for="time_minutes" class="block font-semibold">Time (min):</label>
              <input type="number" name="time_minutes" id="time_minutes" class="w-full p-2 border rounded-md"
                value="{{ $post->time_minutes }}" required />
            </div>

            <div class="mt-6">
              <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Edit post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
