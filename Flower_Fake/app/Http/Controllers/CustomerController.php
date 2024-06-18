<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customer = Customer::orderBy('cus_id', 'DESC')->get();
        return view('customers.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customers.create');
    }
    public function creates()
    {
        //
        return view('users.Home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cus_name' => 'required|max:255|string',
            'cus_gender' => 'sometimes',
            'cus_email' => 'required|max:255|string',
            'cus_phone' => 'required|max:20|string',
            'cus_address' => 'required|max:255|string',
        ]);

        Customer::create([
            'cus_name' => $request->cus_name,
            'cus_gender' => $request->cus_gender == true ? 1 : 0,
            'cus_email' => $request->cus_email,
            'cus_phone' => $request->cus_phone,
            'cus_address' => $request->cus_address,
        ]);
        return redirect('customer/create')->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $cus_id)
    {
        //
        $request->validate([
            'cus_name' => 'required|max:255|string',
            'cus_gender' => 'sometimes',
            'cus_email' => 'required|max:255|string',
            'cus_phone' => 'required|max:20|string',
            'cus_address' => 'required|max:255|string',
        ]);



        Customer::findOrFail($cus_id)->update([
            'cus_name' => $request->cus_name,
            'cus_gender' => $request->cus_gender == true ? 1 : 0,
            'cus_email' => $request->cus_email,
            'cus_phone' => $request->cus_phone,
            'cus_address' => $request->cus_address,
        ]);
        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {



        DB::statement('CALL DeleteCustomer(?)', [$id]);
        return redirect()->back()->with('status', 'xóa thành công');
    }
}
