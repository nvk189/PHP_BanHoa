<?php

namespace App\Http\Controllers;

use App\Models\TKUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new TKUser();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('status', 'Đăng ký thành công');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Login Success');
        }


        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
