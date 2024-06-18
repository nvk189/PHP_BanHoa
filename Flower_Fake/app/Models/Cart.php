<?php

namespace App\Models;

class Cart
{
    public $item = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public function __construct()
    {
        $this->item = session('cart_user') ? session('cart_user') : [];
        $this->totalQuantity = $this->getTotalQuantity();
        $this->totalPrice = $this->getTotalPrice();
    }
    public function add($products, $quantity = 1)

    {
        if (isset($this->item[$products->pr_id])) {
            $this->item[$products->pr_id]->quantity += $quantity;
        } else {

            $cart = (object)[
                'pr_id' => $products->pr_id,
                'pr_name' => $products->pr_name,
                'pr_image' => $products->pr_image,
                'pr_status' => $products->pr_status,
                'pr_price' => $products->pr_sales ? $products->pr_sales : $products->pr_price,
                'pr_sales' => $products->pr_sales,
                'quantity' => 1
            ];

            $this->item[$products->pr_id] = $cart;
        }

        session(['cart_user' => $this->item]);
        // dd($this->item);
    }
    public function update($id, $qtt)
    {
        if (isset($this->item[$id])) {
            $this->item[$id]->quantity = $qtt;
        }
    }
    public function delete($id)
    {
        if (isset($this->item[$id])) {
            unset($this->item[$id]);
            session(['cart_user' => $this->item]);
        }
    }
    public function clear()
    {
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->item as $item) {
            $total += $item->quantity * $item->pr_price;
        }
        return $total;
    }

    public function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->item as $item) {
            $total += $item->quantity;
        }
        return $total;
    }
}
