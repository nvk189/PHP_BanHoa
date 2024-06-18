<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'administrator';
    protected $primaryKey = 'ad_id';

    protected $fillable = [


        'ad_username',
        'ad_pass',
        'ad_fullname',
        'ad_email',
        'ad_phone',
        'ad_address',
        'ad_status',
        'ad_duty',

    ];
}
