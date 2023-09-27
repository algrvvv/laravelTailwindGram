<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use SebastianBergmann\CodeUnit\FunctionUnit;

class PostController extends Controller
{
    public function index()
    {
        // http://laraveltailwind/?search=omnis#
        // dd(request('search'));
        // 'omnis'

        $text = request('search');
        if (request('search')) {
            return view('welcome', [
                'data' => Post::join('users', 'users.id', '=', 'posts.user_id')
                    ->where('title', 'LIKE', '%' . $text . '%')
                    ->orWhere('content', 'LIKE', '%' . $text . '%')
                    ->orWhere('username', 'LIKE', '%' . $text . '%')
                    ->select('posts.*', 'users.username') // без этой строчки генерация ссылки на пост ломалась, хз почему
                    ->paginate(20),
                'text' => $text,
            ]);
        } else {
            // select posts.*, users.username from posts 
            // inner join users on users.id = posts.user_id;
            $data = Post::join('users', 'users.id', '=', 'posts.user_id')
                ->inRandomOrder()
                ->select('posts.*', 'users.username',)
                ->paginate(20);

            return view(
                'welcome',
                [
                    'data'   => $data,
                ]
            );
        }
    }

    public function show($user_id, $id)
    {
        $views = Post::where('user_id', $user_id)->where('id', $id)->value('views') + 1;
        Post::where('user_id', $user_id)->where('id', $id)->update(['views' => $views]);
        // dd($views);
        return view(
            'posts',
            [
                'author'  => User::where('id', $user_id)->value('username'),
                'posts' => Post::where('user_id', $user_id)
                    ->where('id', $id)
                    ->get()
            ]
        );
    }

    public function filter($text)
    {
        return request('filter');
    }

    public function profile($user_id)
    {
        $data = Post::join('users', 'users.id', '=', 'posts.user_id')
            ->where('posts.user_id', $user_id)
            ->get('posts.*', 'users.username',);

        return view(
            'profile',
            [
                'data'     => $data,
                'username' => User::where('id', $user_id)->value('username'),
            ]
        );
    }
}
