<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\product_import;
use App\Models\Products;
use App\Models\Suppliers;
use App\Models\product_import_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart(Products $products, product_import_detail $pt, $pr_id)
    {
        // Lấy sản phẩm bằng ID
        $product = $products::findOrFail($pr_id);
        $pt->add($product);
        return redirect()->route('import.view');
    }

    public function view(product_import_detail $pt, admin $ad)
    {
        $product = Products::get();
        $admin = $ad->where('ad_status', 1)->where('ad_duty', 0)->get();
        $supp = Suppliers::where('sl_status', 1)->get();
        return view('import_product.create', compact('pt', 'product', 'admin', 'supp'));
    }

    public function deleteProduct($id, product_import_detail $pt)
    {
        $pt->remove($id);
        return redirect()->route('import.view');
    }
    public function updateProduct($id, product_import_detail $pt)
    {
        $pp_amount = request('ppd_amount', 1);
        $pt->updates($id, $pp_amount);
        return redirect()->route('import.view');
    }
    public function index()
    {
        $inport = product_import::get();

        $inport = product_import::with('supplier', 'admin')->get();

        return view('import_product.index', compact('inport'));
    }




    public function store(Request $request)
    {
        //
        $data = $request->only('sl_id', 'pp_start', 'pp_price', 'ad_id', 'pp_amonut');
        $ip = product_import::create($data);
        $pp_id = $ip->pp_id;
        $productIds = $request->input('pr_id');
        $amounts = $request->input('ppd_amount');
        $prices = $request->input('ppd_price');

        foreach ($productIds as $key => $productId) {
            $detail = product_import_detail::create([
                'pp_id' => $pp_id,
                'pr_id' => $productId,
                'ppd_amount' => $amounts[$key],
                'ppd_price' => $prices[$key]
            ]);
        }
        if ($ip  &&  $detail) {
            return redirect('import/create')->with('status', 'thêm thành thông');
        } else {
            return redirect()->route('import/create')->with('satus', 'thêm thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(product_import $product_import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(int $id)
    {
        $sx = Suppliers::get();
        $ad = admin::where('ad_status', 1)->where('ad_duty', 0)->get();

        $product = product_import::findOrFail($id);

        $details = product_import_detail::where('pp_id', $id)->get();

        $products = [];
        foreach ($details as $detail) {
            $productInfo = Products::findOrFail($detail->pr_id);
            $products[] = $productInfo;
        }
        return view('import_product.edit', compact('product', 'details', 'products', 'sx', 'ad'));
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, product_import $product_import)
    // {

    //     $request->merge(['pp_price' => str_replace('.', '', $request->pp_price)]);
    //     $data = $request->only('pp_id', 'sl_id', 'pp_start', 'pp_price', 'ad_id', 'pp_amonut');
    //     $id = $request->input('pp_id');
    //     $ip = $product_import->where('pp_id', $id)->update($data);


    //     $productIds = $request->input('pr_id');
    //     $amounts = $request->input('ppd_amount');
    //     $prices = $request->input('ppd_price');

    //     foreach ($productIds as $key => $productId) {
    //         $detail = product_import_detail::update([
    //             'pp_id' => $id,
    //             'pr_id' => $productId,
    //             'ppd_amount' => $amounts[$key],
    //             'ppd_price' => $prices[$key]
    //         ]);
    //     }
    //     if ($ip) {
    //         return Redirect::back()->with('status', 'Cập nhật thành công');
    //     } else {
    //         return redirect()->with('error', 'Cập nhật thất bại');
    //     }
    // }


    public function update(Request $request, product_import $product_import)
    {
        $request->merge(['pp_price' => str_replace('.', '', $request->pp_price)]);
        $data = $request->only('pp_id', 'sl_id', 'pp_start', 'pp_price', 'ad_id', 'pp_amonut');
        $id = $request->input('pp_id');
        $ip = $product_import->where('pp_id', $id)->update($data);

        $productIds = $request->input('pr_id');
        $amounts = $request->input('ppd_amount');
        $prices = $request->input('ppd_price');

        foreach ($productIds as $key => $productId) {
            $detail = product_import_detail::where('pp_id', $id)
                ->where('pr_id', $productId)
                ->update([
                    'ppd_amount' => $amounts[$key],
                    'ppd_price' => $prices[$key]
                ]);
        }

        if ($ip) {
            return Redirect::back()->with('status', 'Cập nhật thành công');
        } else {
            return Redirect::back()->with('error', 'Cập nhật thất bại');
        }
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
