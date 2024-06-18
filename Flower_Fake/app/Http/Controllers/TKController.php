<?php

namespace App\Http\Controllers;

use App\Models\order_detail;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class TKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revenue = DB::select('CALL total()');
        $product = DB::select('CALL getproduct()');

        // dd($revenue);
        $totalRevenue = $revenue[0]->total_revenue;
        $total_product = $revenue[0]->total_products_sold;
        $total_order = $revenue[0]->total_orders_today;
        return view('statistics.statistics', compact('product', 'totalRevenue', 'total_product', 'total_order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function statistics(Request $request)
    {
        // $startDate = $request->input('start_date');
        // $endDate = $request->input('end_date');

        // $results = DB::select('CALL totaldate(?, ?)', array($startDate, $endDate));


        // $a = $results[0]->total_revenue;
        // $b = $results[0]->total_products_sold;
        // $c = $results[0]->total_orders_today;
        // $d = $results[0]->total_orders_huy;

        // return view('statistics.statistics', compact('a', 'b', 'c', 'd'));
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
