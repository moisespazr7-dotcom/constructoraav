<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = ['name', 'trade_id', 'crew_id'];

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
