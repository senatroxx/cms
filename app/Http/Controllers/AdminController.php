<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;
use Carbon\Carbon;
use App\Comments;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $post = Post::all();
        $userCount = DB::Table('role_user')->where('role_id', 1)->count();
        $postWeek = Post::where('created_at', '>', Carbon::now()->startOfWeek())
                        ->where('created_at', '<', Carbon::now()->endOfWeek())
                        ->count();
        $userWeek = User::join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->where('role_user.role_id', 1)
                        ->where('users.created_at', '>', Carbon::now()->startOfWeek())
                        ->where('users.created_at', '<', Carbon::now()->endOfWeek())
                        ->count();
        $comments = Comments::all();
        $commentsWeek = Comments::where('created_at', '>', Carbon::now()->startOfWeek())
                                ->where('created_at', '<', Carbon::now()->endOfWeek())
                                ->count();

        return view('admin.index', ['post' => $post, 'user' => $userCount, 'postWeek' => $postWeek, 'userWeek' => $userWeek, 'comments' => $comments, 'commentsWeek' => $commentsWeek]);
    }
}
