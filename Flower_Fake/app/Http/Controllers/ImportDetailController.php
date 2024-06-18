<?php

namespace App\Http\Controllers;

use App\Models\product_import_detail;
use Illuminate\Http\Request;

class ImportDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(product_import_detail $product_import_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $detail = product_import_detail::findOrFail($id);
        return $detail;
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product_import_detail $product_import_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product_import_detail $product_import_detail)
    {
        //
    }
}
