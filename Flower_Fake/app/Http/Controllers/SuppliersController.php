<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = Suppliers::orderBy('sl_id', 'desc')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function indexip()
    {
        $supp = Suppliers::select('sl_id', 'sl_name')->get();
        return $supp;
    }
    public function indexname(int $id)
    {
        $supp = Suppliers::select('sl_name')->where('sl_id', $id)->get();
        return $supp;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sl_name' => 'required|max:255|string',
            'sl_email' => 'required|max:255|string',
            'sl_phone' => 'required|max:20|string',
            'sl_address' => 'required|max:255|string',
            'sl_status' => 'sometimes',
        ]);

        Suppliers::create([

            'sl_name' => $request->sl_name,
            'sl_email' => $request->sl_email,
            'sl_phone' => $request->sl_phone,
            'sl_address' => $request->sl_address,
            'sl_status' => $request->sl_status == true ? 1 : 0,
        ]);

        return redirect('suppliers/create')->with("status", "Thêm thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $suppliers = Suppliers::findOrFail($id);
        return view('suppliers.edit', compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $request->validate([
            'sl_name' => 'required|max:255|string',
            'sl_email' => 'required|max:255|string',
            'sl_phone' => 'required|max:20|string',
            'sl_address' => 'required|max:255|string',
            'sl_status' => 'sometimes',
        ]);

        Suppliers::findOrFail($id)->update([

            'sl_name' => $request->sl_name,
            'sl_email' => $request->sl_email,
            'sl_phone' => $request->sl_phone,
            'sl_address' => $request->sl_address,
            'sl_status' => $request->sl_status == true ? 1 : 0,
        ]);

        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, Suppliers $resource)
    {
        //
        $resource->where('sl_id', $id)->update(['sl_status' => 0]);
        return redirect()->back()->with('status', 'Xóa thành công');
    }
}
