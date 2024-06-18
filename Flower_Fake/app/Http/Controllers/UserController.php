<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Products;
use App\Models\TKUser;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            return redirect()->route('user.login')->with('status', 'Đăng ký thành công');
        } else {
            return redirect()->route('user/register')->with('error', 'Đăng ký thất bại');
        }
    }


    public function check_login(Request $request)
    {
        request()->validate([
            'name' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $data = request()->only('name', 'password');
        $check = auth()->attempt($data);
        // dd($check);
        if ($check) {
            if (auth()->user()->user_status == 0) {
                auth()->logout();
                return redirect()->back()->withErrors(['name' => 'Tài khoản không tồn tại']);
            }
            return redirect()->route('home.index')->with('status', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->withErrors(['name' => 'Email hoặc mật khẩu  không đúng']);
        }
    }

    // public function check_login(Request $request)
    // {
    //     $request->validate([
    //         'cus_name' => 'required|email|exists:user',
    //         'cus_pass' => 'required',
    //     ]);

    //     $credentials = $request->only('cus_name', 'cus_pass');

    //     $user = TKUser::where('cus_name', $credentials['cus_name'])->first();


    //     if ($user && Hash::check($credentials['cus_pass'], $user->cus_pass)) {


    //         if ($user->user_status == 0) {

    //             auth('us')->logout();
    //             return redirect()->back()->withErrors(['cus_name' => 'Tài khoản không tồn tại']);
    //         }

    //         return redirect()->route('home.index')->with('status', 'Đăng nhập thành công');
    //     } else {
    //         return redirect()->back()->withErrors(['cus_name' => 'Email hoặc mật khẩu không đúng']);
    //     }
    // }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
