<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        // select users.username, sum(posts.views) as 'views' from users
        // inner join posts on posts.user_id = users.id
        // group by username;

        if (request('search')) {
            $data = DB::table('users')
                ->join('posts', 'posts.user_id', '=', 'users.id')
                ->select('users.*',  DB::raw('SUM(views) as views'), DB::raw('COUNT(*) as count'))
                ->where('username', 'LIKE', '%' . request('search') . '%')
                ->where('access', true)
                ->groupBy('user_id')
                ->orderBy('username', 'asc')
                ->paginate(18);
            return view(
                'authors',
                [
                    'data'  => $data,
                ]
            );
        } else {
            $data = DB::table('users')
                ->join('posts', 'posts.user_id', '=', 'users.id')
                ->where('access', true)
                ->select('users.*',  DB::raw('SUM(views) as views'), DB::raw('COUNT(*) as count'))
                ->groupBy('user_id')
                ->orderBy('username', 'asc')
                ->paginate(18);
            return view(
                'authors',
                [
                    'data'  => $data,
                ]
            );
        }
    }
}
