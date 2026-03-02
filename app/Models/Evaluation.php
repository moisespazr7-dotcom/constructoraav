<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crew;
use App\Models\Project;
use App\Models\Task;
use App\Models\Trade;
use App\Models\User;
use App\Models\Worker;

class Evaluation extends Model
{
    protected $fillable = [
        'project_id',
        'trade_id',
        'crew_id',
        'worker_id',
        'task_id',
        'evaluator_user_id',
        'notes',
        'evaluated_at',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_user_id');
    }
}
