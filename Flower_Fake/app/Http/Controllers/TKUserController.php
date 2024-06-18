<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TKUser;
use App\Models\Customer;

class TKUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tk  = TKUser::orderBY('user_id', 'desc')->get();
        $tk = TKUser::with('customer')->get();
        return view('tkUser.index', compact('tk'));
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
    public function destroy(int $id, TKUser $user)
    {
        //

        $user->where('user_id', $id)->update(['user_status' => 0]);
        return redirect()->back()->with('status', 'Xóa thành công');
    }
}
