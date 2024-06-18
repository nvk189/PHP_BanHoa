<?php

namespace App\Models;

use App\Http\Controllers\ImportDetailController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product_import extends Model
{
    use HasFactory;
    public $item = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $timestamps = false;
    protected $table = 'product_import';
    public $primaryKey = 'pp_id';
    protected $fillable = [
        'sl_id',
        'pp_start',
        'pp_price',
        'ad_id',
        'pp_amonut'
    ];


    public function supplier()
    {
        return $this->hasOne(Suppliers::class, 'sl_id', 'sl_id');
    }

    // Mối quan hệ với bảng admin
    public function admin()
    {
        return $this->hasOne(admin::class, 'ad_id', 'ad_id');
    }
    public function detail()
    {
        return $this->hasOne(product_import_detail::class, 'pp_id', 'pp_id');
    }
}
