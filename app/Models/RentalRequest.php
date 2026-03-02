<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'equipment',
        'rental_date',
        'details',
        'status',
    ];
}
