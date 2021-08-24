<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\favoritesResource;
use App\Http\Resources\newfavoritesResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Models\Comments;
use App\Models\favorites;
use App\Models\likes;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {

        $page_number = intval( \request()->get('page_number'));
        $page_size = \request()->get('page_size');
//        $posts = Posts::all();


        $friends = \auth()->user()->friends->pluck('id')->toArray();

        $users = array_merge($friends,[\auth()->user()->id]);

        $total_records = Posts::whereIn('user_id',$users)->count();

        $total_pages = ceil($total_records / $page_size);

        $posts = Posts::whereIn('user_id',$users)->skip(($page_number - 1) * $page_size)
            ->take($page_size)->get();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'items' => [
                'data' => PostsResource::collection($posts),
                "page_number" => $page_number,
                "total_pages" => $total_pages,
                "total_records" => $total_records,

            ]

        ];

        return response()->json($data);
    }

    public function show($post_id)
    {
        $post = Posts::find($post_id);
        if (isset($post)) {
            $data = [
                'status' => true,
                'statusCode' => 200,
                'message' => 'Success',
                'items' => new PostResource($post),

            ];

            return response()->json($data);

        }

        $data = [
            'status' => false,
            'statusCode' => 422,
            'message' => 'Error',
            'items' => new \stdClass(),

        ];

        return response()->json($data);

    }

    public function store(Request $request)
    {
        $post = Posts::create([
            'text' => $request->input('text'),
            'user_id' => Auth::user()->id,
        ]);
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Post has been added',
            'items' => new PostResource($post),

        ];

        return response()->json($data);
    }
    public function addfavorites(Request $request){
        $myrequest=$request->input('post_id');
        if(!$myrequest==Posts::find($myrequest)){
            $data = [
                'status' => false,
                'statusCode' => 500,
                'message' => 'There is no Post has this id',
                'items' => '',

            ];

            return response()->json($data);
        }
        $favorites = favorites::create([
            'post_id' => $request->input('post_id'),
            'user_id' => Auth::user()->id,
        ]);

        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Post has been added to your favorites',
            'items' => new newfavoritesResource($favorites),

        ];

        return response()->json($data);
        }
}
