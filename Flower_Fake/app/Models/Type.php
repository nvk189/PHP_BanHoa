<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pr_type';
    protected $primaryKey = 'pt_id';
    protected $fillable = [
        'pt_name',
    ];
}
