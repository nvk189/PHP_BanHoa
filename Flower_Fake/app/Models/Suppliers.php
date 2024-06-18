<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'Suppliers';
    protected $primaryKey = 'sl_id';
    protected $fillable = [
        'sl_name',
        'sl_address',
        'sl_phone',
        'sl_email',
        'sl_status',
    ];
}
