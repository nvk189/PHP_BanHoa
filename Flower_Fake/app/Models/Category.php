<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    public $primaryKey = 'ct_id';

    protected $fillable = [
        'pr_id',
        'ct_describe1',
        'ct_describe2',

    ];
}
