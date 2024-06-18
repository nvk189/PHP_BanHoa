<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Products;
use App\Models\TKUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginUserController extends Controller
{
    //
    public function index(Cart $cart)
    {
        //
        return view('users.Sign', compact('cart'));
    }
    public function login(Cart $cart)
    {
        return view('users.LoginUser', compact('cart'));
    }

    public function home()
    {
        //
        $home = Products::get();
        return view('users.Home', compact('home'));
    }
    public function product(int $id)
    {

        $data = Products::findOrFail($id);
        return view('users.detail', compact('data'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function check_register(Request $request)
    {


        $request->validate([
            'cus_name' => 'required',
            'cus_gender' => 'required',
            'cus_email' => 'required|email|unique:customer',
            'cus_phone' => 'required',
            'cus_address' => 'required',
            'password' => 'required',
        ]);
        $gender = ($request->input('cus_gender') == 'Nam') ? 1 : 0;


        $data = [
            'cus_name' => $request->input('cus_name'),
            'cus_gender' => $gender,
            'cus_email' => $request->input('cus_email'),
            'cus_phone' => $request->input('cus_phone'),
            'cus_address' => $request->input('cus_address'),
        ];

        // $data['cus_pass'] = bcrypt($request->input('cus_pass'));
        $data['password'] = Hash::make($request->input('password'));

        // dd($data);
        $sign = Customer::create($data);
        $cus_id = $sign->cus_id;

        $data1 = [
            'cus_id' => $cus_id,
            'name' => $request->input('cus_email'),
            'password' => $data['password'],
            'user_status' => 1
        ];

        $sign1 = TKUser::create($data1);

        if ($sign &&  $sign1) {
            return redirect()->route('login')->with('status', 'Đăng ký thành công');
        } else {
            return redirect()->route('register')->with('error', 'Đăng ký thất bại');
        }
    }


    public function check_login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('home.user');
        }

        return back()->withErrors([
            'name' => 'Tài khoản hoặc mật khẩu không đúng',
        ])->onlyInput('name');
    }
}
