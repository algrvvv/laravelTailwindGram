<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function index()
    {
        // $user = auth()->user(); // получение всей информации о пользователе - 1 вариант
        // $user = Auth::user(); // такой же вывод информации - 2 варик

        return view('create');
    }

    public function store(Request $request){
        
        $user = auth()->user();
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->views = 0;
        $post->user_id = $user->id;

        $post->save();

        return redirect()->route('home')->with('success', 'Post was successfully published!');
    }
}
