<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingAction extends Model
{
    protected $fillable = [
        'project_id',
        'trade_id',
        'crew_id',
        'responsible_user_id',
        'status',
        'notes',
    ];
}
