<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    // public function index(){
    //     return view('comment');
    // }

    public function store($post_id)
    {
        $user = auth()->user();
        $comm = new Comments();

        $comm->post_id = $post_id;
        $comm->user_id = $user->id;
        $comm->title = request()->input('title');
        $comm->content = request()->input('content');

        $comm->save();

        return redirect()->back()->with('success', 'Your comment was successfully published!');
    }
}
