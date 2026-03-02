<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationItem extends Model
{
    protected $fillable = [
        'evaluation_id',
        'question',
        'score',
        'comment',
    ];
}
