<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class LoginAdminController extends Controller
{
    //
    public function index()
    {
        return view('users.test');
    }
    public function login(Cart $cart)
    {
        return view('login', compact('cart'));
    }

    public function check_login()
    {
        $data = request()->all('name', 'password');
        dd($data);
    }
    public function register(Cart $cart)
    {
        return view('register', compact('cart'));
    }

    public function check_register()
    {
        $data = request()->all('name', 'password');
        dd($data);
    }
}
