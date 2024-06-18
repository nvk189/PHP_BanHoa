<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'orders_detail';
    protected $primaryKey = 'od_id';
    protected $foreignKey = 'order_id';
    protected $fillable = [
        'order_id',
        'pr_id',
        'od_quanlity',
        'od_price',
    ];

    // Chỉ định tên cột foreign key là 'order_id'
    public function order()
    {
        return $this->belongsTo(order::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'pr_id');
    }
}
