<?php

namespace App\Models;

use App\Http\Controllers\CustomerController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [

        'cs_id',
        'order_date_start',
        'order_date_end',
        'cus_name',
        'cus_phone',
        'cus_address',
        'order_price',
        'order_status',
        'order_price',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cs_id');
    }

    public function details()
    {
        return $this->hasMany(order_detail::class);
    }
}
