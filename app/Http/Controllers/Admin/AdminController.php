<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'data'  => Post::where('access', false)->get(),
            // 'count' => Post::where('access', false)->get(),
        ]);
    }

    public function submit($id){

        $posts = Post::find($id);

        $posts->title = Post::where('id', $id)->value('title');
        $posts->content = Post::where('id', $id)->value('content');
        $posts->views = Post::where('id', $id)->value('views');
        $posts->user_id = Post::where('id', $id)->value('user_id');
        $posts->access = true;

        $posts->save();

        return redirect()->back();
    }
}
