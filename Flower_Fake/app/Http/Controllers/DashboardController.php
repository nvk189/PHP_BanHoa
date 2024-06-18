<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Products;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $revenue = DB::select('CALL CalculateRevenue()');

        $totalRevenue = $revenue[0]->total_revenue;
        $order = order::where('order_status', 'cxn')->get();
        $or = order::where('order_status', 'cxn')->count();
        $product = Products::where('pr_status', 'kd')->count();
        // dd($totalRevenue, $order, $or, $product);
        return view('dashboard', compact('order', 'product', 'or', 'totalRevenue'));
    }

    public function update(Request $request)
    {
        $selectedOrders = $request->input('selected_orders', []);

        order::whereIn('order_id', $selectedOrders)->update(['order_status' => 'ht']);

        return redirect('dashboard');
    }

    /**
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
