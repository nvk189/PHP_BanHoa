<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(Cart $cart)
    {



        $home = Products::get();

        $sales = Products::where('pr_sales', '<>', 0)->take(4)->get();
        $user = Auth::user();
        $new = Products::where('pt_id', 5)->take(4)->get();
        return view('users.homeuser', compact('home', 'sales', 'new', 'cart'));
    }
    public function product(int $id, Cart $cart)
    {

        $data = Products::findOrFail($id);

        $type = Products::where('pt_id', $data->pt_id)->take(4)->get();;
        return view('users.detail', compact('data', 'cart', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */

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