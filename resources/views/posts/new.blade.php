@extends('layouts.app')
@section('content')
  <div class="d-flex ">
    <div class="container w-3/2 mx-auto flex flex-row justify-center item-center">
      <div class="card text-center pt-5 w-96">
        <div class="card-body text-center">
          <h2 class="text-xl font-semibold">Create a new post</h2>
          <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mt-4">
              <label for="date" class="block font-semibold">Date:</label>
              <input type="date" name="date" id="date" class="w-full p-2 border rounded-md" value=""
                required />
            </div>

            <div class="mt-4">
              <label for="distance" class="block font-semibold">Distance (km):</label>
              <input type="number" name="distance" id="distance" class="w-full p-2 border rounded-md" value=""
                required />
            </div>

            <div class="mt-4">
              <label for="time_minutes" class="block font-semibold">Time (min):</label>
              <input type="number" name="time_minutes" id="time_minutes" class="w-full p-2 border rounded-md"
                value="" required />
            </div>

            <div class="mt-6">
              <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md">Create
                post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
