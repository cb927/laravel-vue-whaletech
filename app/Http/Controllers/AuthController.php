<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Go to login page.
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    //Login user
    public function login_user(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if(Auth::attempt($credentials)) {
            return redirect(route('admin.dashboard'));
        } else {
            return redirect(route('login'));
        }
    }
    
    //Go to register page.
    public function register()
    {
        return view('auth.register');
    }

    //Register user
    public function store_user(Request $request)
    {
        $name = $request->username;
        $email = $request->email;
        $password = $request->password;

        User::create([
            'name' => $name,
            'role_id' => 2,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return redirect(route('login'));
    }
}
