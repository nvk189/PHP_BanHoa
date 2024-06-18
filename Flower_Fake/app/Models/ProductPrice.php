<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $table = 'pr_price';
    public $timestamps = false;
    public $primaryKey = 'price_id';

    protected $fillable = [
        'pr_id',
        'price_real',
        'price_sales',
        'price_date_start',
        'price_date_end'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'pr_id');
    }
}
