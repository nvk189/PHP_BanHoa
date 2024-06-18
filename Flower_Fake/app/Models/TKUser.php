<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TKUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'cus_id',
        'name',
        'password',
        'user_status',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cus_id');
    }
}
