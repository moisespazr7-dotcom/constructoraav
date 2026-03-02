<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\Project;
use App\Models\Task;
use App\Models\Trade;
use App\Models\Worker;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        return view('admin.evaluations.index', [
            'items' => Evaluation::with(['project', 'trade', 'crew', 'worker', 'task'])
                ->latest()
                ->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.evaluations.create', [
            'projects' => Project::orderBy('name')->get(),
            'trades' => Trade::orderBy('name')->get(),
            'crews' => Crew::orderBy('name')->get(),
            'workers' => Worker::orderBy('name')->get(),
            'tasks' => Task::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => ['nullable', 'exists:projects,id'],
            'trade_id' => ['nullable', 'exists:trades,id'],
            'crew_id' => ['nullable', 'exists:crews,id'],
            'worker_id' => ['nullable', 'exists:workers,id'],
            'task_id' => ['nullable', 'exists:tasks,id'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'evaluated_at' => ['nullable', 'date'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.question' => ['required', 'string', 'max:255'],
            'items.*.score' => ['required', 'in:ok,warn,bad'],
            'items.*.comment' => ['nullable', 'string', 'max:500'],
        ]);

        $evaluation = Evaluation::create([
            'project_id' => $data['project_id'] ?? null,
            'trade_id' => $data['trade_id'] ?? null,
            'crew_id' => $data['crew_id'] ?? null,
            'worker_id' => $data['worker_id'] ?? null,
            'task_id' => $data['task_id'] ?? null,
            'evaluator_user_id' => $request->user()->id,
            'notes' => $data['notes'] ?? null,
            'evaluated_at' => $data['evaluated_at'] ?? now()->toDateString(),
        ]);

        foreach ($data['items'] as $item) {
            EvaluationItem::create([
                'evaluation_id' => $evaluation->id,
                'question' => $item['question'],
                'score' => $item['score'],
                'comment' => $item['comment'] ?? null,
            ]);
        }

        return redirect()->route('admin.evaluations.index')->with('success', 'Evaluacion creada.');
    }
}
