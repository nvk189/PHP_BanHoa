<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\product_import_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    /**
     * Display a li
     * sting of the resource.
     */


    public function index()
    {


        //
        $product = Products::orderBy("pr_id", "DESC")->get();
        $product = Products::with('type')->get();
        // $type = ProductType::get();
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $type = ProductType::get();
        return view('products.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $data = $request->only('pr_name', 'pt_id', 'pr_image', 'pr_amount', 'pr_view', 'pr_status', 'pr_price', 'pr_sales');
        // dd($data);
        $product = Products::create($data);
        $productId = $product->pr_id;
        $cate = Category::create([
            'pr_id' => $productId,
            'ct_describe1' => $request->ct_describe1,
            'ct_describe2' => $request->ct_describe2,

        ]);



        if ($product &&  $cate) {

            return redirect('products')->with('status', 'thêm thành công!');
        } else {
            return back()->withErrors(['error' => 'lỗi thêm sản phẩm ']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $product = Products::findOrFail($id);


        $category = Category::where('pr_id', $id)->first();
        $type = ProductType::get();

        return view('products.edit', compact('product', 'category', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products, Category $category)
    {
        //
        $data = $request->only(['pr_name', 'pt_id', 'pr_image', 'pr_amount', 'pr_view', 'pr_status', 'pr_price', 'pr_sales']);
        $data1 = $request->only(['ct_describe1', 'ct_describe2']);
        $productId = $request->input('pr_id');

        $pr = $products->where('pr_id', $productId)->update($data);
        $cate = $category->where('pr_id', $productId)->update($data1);

        if ($pr !== false || $cate !== false) {
            return redirect('products')->with('status', 'Cập nhật thành công!');
        } else {
            return back()->withErrors(['error' => 'Lỗi cập nhật sản phẩm']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, Products $products)
    {
        //      
        $products->where('pr_id', $id)->update(['pr_status' => 'nkd']);

        return redirect()->back()->with('status', 'Xóa thành công');
    }

    // thêm sản phẩm nhập
    // public function add_import(Request $request)
    // {
    //     $import = [];
    // }
}
