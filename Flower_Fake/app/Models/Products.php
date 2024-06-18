<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    public $item = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $timestamps = false;
    protected $table = 'products';
    public $primaryKey = 'pr_id';
    protected $fillable = [

        'pr_name',
        'pt_id',
        'pr_image',
        'pr_amount',
        'pr_view',
        'pr_status',
        'pr_price',
        'pr_sales'
    ];


    public function type()
    {
        return $this->hasOne(ProductType::class, 'pt_id');
    }
}
