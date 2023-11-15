<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Post::where('user_id', auth()->user()->id)->orderBy('date', 'desc');

        if ($start_date && $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        }
        $posts = $query->get();
        return view('posts.index', compact('posts'));
    }

    public function new()
    {
        return view('posts.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'distance' => 'required|numeric',
            'time_minutes' => 'required|integer',
        ]);
        $post = new Post([
            'date' => $request->input('date'),
            'distance' => $request->input('distance'),
            'time_minutes' => $request->input('time_minutes'),
            'user_id' => auth()->user()->id,
        ]);
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'date' => 'required|date',
            'distance' => 'required|numeric',
            'time_minutes' => 'required|integer',
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully');
    }

}
