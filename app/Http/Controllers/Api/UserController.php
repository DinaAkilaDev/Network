<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\favoritesResource;
use App\Http\Resources\freindResource;
use App\Http\Resources\newfreindResource;
use App\Http\Resources\PostsResource;
use App\Http\Resources\UserResource;
use App\Models\favorites;
use App\Models\friends;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function login()
    {

        $proxy = Request::create('oauth/token', 'POST');

        $response = Route::dispatch($proxy);
        $statusCode = $response->getStatusCode();
        $response = json_decode($response->getContent());

        if ($statusCode != 200) {
            $data = [
                'status' => false,
                'statusCode' => $statusCode,
                'message' => $response->message,
                'items' => $response,

            ];
            return response()->json($data);

        }


        $user = User::where('email', \request()->get('username'))->first();
        $data = [
            'status' => true,
            'statusCode' => $statusCode,
            'message' => 'Successfully Login!',
            'items' => [
                'token' => $response,
                'user' => $user,
            ],

        ];

        return response()->json($data);
    }

    public function show($id = null)
    {
        if (isset($id)) {
            $user = User::find($id);
            if (!isset($user)) {
                $data = [
                    'status' => false,
                    'statusCode' => 422,
                    'message' => 'Error',
                    'items' => new \stdClass(),

                ];

                return response()->json($data);
            }
        }
        $user = isset($id) ? $user : \auth()->user();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'items' => $user,

        ];

        return response()->json($data);

    }

    public function see()
    {
        $myfreind=Auth::user()->friends;

        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'items' =>  freindResource::collection($myfreind),

        ];
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'items' =>new  UserResource($user),

        ];
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $valid = validator($request->only('email', 'name', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($valid->fails()) {

            $errors = [];
            $items = [];
            $temp = 0;
            $message = 'Validation Error';
            foreach ($valid->errors()->getMessages() as $key => $error) {
                $errors['fieldname'] = $key;
                $errors['message'] = $error[0];

                $items[] = $errors;

                if ($temp++ == 0) {
                    $message = $error[0];
                }
            }
            $data = [
                'status' => false,
                'statusCode' => 422,
                'message' => $message,
                'items' => $items,

            ];

            return response()->json($data);
        }

        $data = request()->only('email', 'name', 'password');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $request->request->add(['username' => $data['email']]);
        return $this->login();
    }

    public function forgotPassword(Request $request)
    {
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => "required|email"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $response = Password::sendResetLink($input);

        $message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' : 'SOMETHING_WRONG';
        if ($message== 'SOMETHING_WRONG'){
            $data = [
                'status' => false,
                'statusCode' => 400,
                'message' => $message,
                'items' => '',

            ];
        }
        if ($message== 'Mail send successfully'){
            $data = [
                'status' => true,
                'statusCode' => 200,
                'message' => $message,
                'items' => '',

            ];
        }


        return response()->json($data);
    }

    public function display()
    {
        $fav = favorites::get();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Sucess',
            'items' =>  favoritesResource::collection($fav),

        ];

        return response()->json($data);
    }
    public function home(){
        $mypost=Auth::user()->Posts;
        $page_number = intval( \request()->get('page_number'));
        $page_size = \request()->get('page_size');
        $total_records = $mypost->count();
        $total_pages = ceil($total_records / $page_size);
        $posts = $mypost->skip(($page_number - 1) * $page_size)
            ->take($page_size)->all();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Sucess',
            'items' => [
                'data' => PostsResource::collection($posts),
                "page_number" => $page_number,
                "total_pages" => $total_pages,
                "total_records" => $total_records,
                ]

        ];

        return response()->json($data);

    }
    public function addfriends(Request $request){
        $myrequest=$request->input('friend_id');
        if(!$myrequest==User::find($myrequest)){
            $data = [
                'status' => false,
                'statusCode' => 500,
                'message' => 'There is no Friend has this id',
                'items' => '',

            ];

            return response()->json($data);
        }
        $friend = friends::create([
            'user_id' => Auth::user()->id,
            'friend_id' => $request->input('friend_id'),
        ]);

            $data = [
                'status' => true,
                'statusCode' => 200,
                'message' => 'Friend has been added',
                'items' => new newfreindResource($friend),
                'items' => '',

            ];

        return response()->json($data);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'Successfully logged out',
            'items' => '',
        ];
        return response()->json($data);
    }

}
