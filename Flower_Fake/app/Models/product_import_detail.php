<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_import_detail extends Model
{
    use HasFactory;
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $timestamps = false;
    protected $table = 'product_import_detail';
    protected $primaryKey = 'ppd_id';
    protected $fillable = [
        'ppd_id',
        'pp_id',
        'pr_id',
        'ppd_amount',
        'ppd_price',
    ];
    public function __construct()
    {
        $this->items = session('cart', []);

        $this->totalQuantity = $this->gettotalquantity();
        $this->totalPrice = $this->gettotalprice();
    }

    public function add($product)
    {


        $cart = session('cart', []);


        if (isset($cart[$product->pr_id])) {
            $cart[$product->pr_id]['pr_amount']++;
        } else {

            $cart[$product->pr_id] = [
                'pr_id' => $product->pr_id,
                'pr_name' => $product->pr_name,
                'pr_image' => $product->pr_image,
                'pr_price' =>  $product->pr_price,
                'pr_sales' =>  $product->pr_sales,
                'pr_amount' => 1,
            ];
        }

        session(['cart' => $cart]);
    }

    public function updates($id, $qtt)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]->pr_amount  = $qtt;
        }
    }
    public function remove($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
    }
    public function clear()
    {
    }
    private function gettotalprice()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['pr_amount'] * ($item['pr_sales'] ? $item['pr_sales'] : $item['pr_price']);
        }
        return $total;
    }
    private function gettotalquantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['pr_amount'];
        }
        return $total;
    }
}
