<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'cus_id';
    protected $table = 'customer';
    protected $fillable = [

        'cus_name',
        'cus_gender',
        'cus_email',
        'cus_phone',
        'cus_address'
    ];
}
