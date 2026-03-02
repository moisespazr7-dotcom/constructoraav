<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadContact extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'project_address',
        'project_info',
        'status',
    ];
}
