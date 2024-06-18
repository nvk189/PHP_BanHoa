<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_detail;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginUserController;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_user()
    {
        return view('users.Bill');
    }
    public function index()
    {
        //
        $orders = order::orderBy('order_id', 'DESC')->get();
        $order = order::with('customer')->get();
        return view('order.index', compact('order'));
    }

    public function view(LoginUserController $login, Cart $cart)
    {
        // $login = $login->check_login();
        // dd(Auth::user());
        // if (Auth::check()) {
        // } else {
        // }
        return view('users.Bill', compact('cart'));
    }

    public function deleteOrder(Cart $cart, $id)
    {

        $cart->delete($id);
        return redirect()->route('order.view');
    }
    public function indexip()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $order = order::create([
            'cs_id' => 19,
            'order_date_start' => $request->order_date_start,
            'order_date_end' => $request->order_date_end,
            'cus_name' => $request->cus_name,
            'cus_phone' => $request->cus_phone,
            'cus_address' => $request->cus_address,
            'order_status' => 'cxn',
            'order_price' => str_replace('.', '', $request->order_price),
        ]);

        $pp_id = $order->order_id;
        $productIds = $request->input('pr_id');
        $amounts = $request->input('od_quanlity');
        $prices = $request->input('od_price');


        foreach ($productIds as $key => $productId) {
            $detail = order_detail::create([
                'order_id' => $pp_id,
                'pr_id' => $productId,
                'od_quanlity' => $amounts[$key],
                'od_price' => str_replace('.', '', $prices[$key])
            ]);
        }
        if ($detail) {
            return redirect()->route('order.create')->with('alert', 'đặt hàng thành công');
        } else {
            return redirect()->route('order.create')->with('error', 'đặt hàng thất bại');
        }
    }


    public function print(Request $request, int $id)
    {
        $order = order::findOrFail($id);
        // $product = $products::get();

        // $order_detail = order_detail::select('pr_id', 'od_quanlity', 'od_price')->where('order_id', $id)->get();
        $order_detail = order_detail::where('order_id', $id)->get();

        // $details = product_import_detail::where('pp_id', $id)->get();

        $products = [];
        foreach ($order_detail as $detail) {
            $productInfo = Products::findOrFail($detail->pr_id);
            $products[] = $productInfo;
        }
        return view('order.print', compact('order', 'order_detail', 'products'));
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
    public function edit(int $id, Products $products)
    {
        $order = order::findOrFail($id);
        $product = $products::get();

        $order_detail = order_detail::select('pr_id', 'od_quanlity', 'od_price')->where('order_id', $id)->get();

        return view('order.edit', compact('order', 'order_detail', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id, order $order)
    {
        //
        $order->where('order_id', $id)->update(['order_status' => 'huy']);

        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
