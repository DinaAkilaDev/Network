<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{


    public function login()
    {

        $proxy = Request::create('oauth/token','POST');

       $response = Route::dispatch($proxy);

       dd($response);
    }
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function update(User $user)
    {
        if(Auth::user()->email == request('email')) {

            $this->validate(request(), [
                'name' => 'required',
                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();

        }
        else{

            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();}
        }
}
