<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart(Products $products, Cart $cart, $pr_id)
    {
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $product = $products::findOrFail($pr_id);
        $cart->add($product, $quantity);

        return redirect()->route('cart.view');
    }
    public function view(Cart $cart)
    {
        return view('users.Cart', compact('cart'));
    }

    public function deleteCart(Cart $cart, $id)
    {

        $cart->delete($id);
        return redirect()->route('cart.view');
    }
    public function updateCart(Cart $cart, $id)
    {
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $cart->update($id, $quantity);
        return redirect()->route('cart.view');
    }



    public function index()
    {
        //
        return view('users.Cart');
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
