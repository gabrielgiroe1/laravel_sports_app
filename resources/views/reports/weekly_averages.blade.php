@extends('layouts.app')

@section('content')
@section('content')
  <div class="text-center bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold">Weekly Averages</h2>
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Week</th>
          <th scope="col">Average Distance (km)</th>
          <th scope="col">Average Speed (minutes)</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($weekly_totals as $week)
          <tr>
            <th scope="row">{{ $week['week'] }}</th>
            <td>{{ number_format($week['total_distance'], 2) }} km</td>
            <td>{{ number_format($week['total_time'], 2) }} minutes</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-3"><a href="{{ route('posts.index') }}" class="bg-blue-500 text-blue font-semibold py-2 px-4 rounded-md">Back to
      posts</a>
  </div>
@endsection
