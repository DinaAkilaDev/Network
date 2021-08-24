<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\likes;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')->paginate(5);
        $friends=Auth::user()->friends;
        return view('home', ['posts' => $posts,'friends'=>$friends]);
    }
    public function show(Posts  $post)
    {
        $comments = Comments::find($post);
        $friends=Auth::user()->friends;
        $like = likes::find($post);

        return view('post', compact('post','like','comments','friends'));

    }
    public function profile($user_id=null){
        if(isset($user_id)) {
            return User::find($user_id);
            return Auth::user();
        }
    }
}
