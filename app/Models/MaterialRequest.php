<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'material',
        'quantity',
        'details',
        'status',
    ];
}
