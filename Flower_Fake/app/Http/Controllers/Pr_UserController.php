<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Products;

class Pr_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Cart $cart)
    {
        //
        $home = Products::paginate(12);
        return view('users.product', compact('home', 'cart'));
    }

    public function protype(Cart $cart)
    {
        $home = Products::where("pt_id", 1)->paginate(12);
        return view('users.searchUser', compact('home', 'cart'));
    }
    public function search(Request $request, Cart $cart)
    {
        $key = $request->input('keyword');
        $data = Products::where('pr_name', 'like', '%' . $key . '%')->paginate(12);

        return view('users.search', compact('data', 'key', 'cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function asc(Cart $cart)
    {
        $home = Products::orderBy('pr_price', 'asc');
        return view('users.product', compact('home', 'cart'));
    }
    public function desc(Cart $cart)
    {
        $home = Products::orderBy('pr_price', 'desc')->paginate(10);
        return view('users.product', compact('home', 'cart'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
