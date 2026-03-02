<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use App\Models\Project;
use App\Models\Task;
use App\Models\Trade;
use App\Models\Worker;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('admin.catalogs.index', [
            'projects' => Project::orderBy('name')->get(),
            'trades' => Trade::orderBy('name')->get(),
            'crews' => Crew::orderBy('name')->get(),
            'workers' => Worker::with(['trade', 'crew'])->orderBy('name')->get(),
            'tasks' => Task::orderBy('name')->get(),
        ]);
    }

    public function storeProject(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255']]);
        Project::create($data);
        return back()->with('success', 'Proyecto creado.');
    }

    public function destroyProject(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Proyecto eliminado.');
    }

    public function storeTrade(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255']]);
        Trade::create($data);
        return back()->with('success', 'Oficio creado.');
    }

    public function destroyTrade(Trade $trade)
    {
        $trade->delete();
        return back()->with('success', 'Oficio eliminado.');
    }

    public function storeCrew(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255']]);
        Crew::create($data);
        return back()->with('success', 'Cuadrilla creada.');
    }

    public function destroyCrew(Crew $crew)
    {
        $crew->delete();
        return back()->with('success', 'Cuadrilla eliminada.');
    }

    public function storeWorker(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'trade_id' => ['nullable', 'exists:trades,id'],
            'crew_id' => ['nullable', 'exists:crews,id'],
        ]);
        Worker::create($data);
        return back()->with('success', 'Colaborador creado.');
    }

    public function destroyWorker(Worker $worker)
    {
        $worker->delete();
        return back()->with('success', 'Colaborador eliminado.');
    }

    public function storeTask(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255']]);
        Task::create($data);
        return back()->with('success', 'Tarea creada.');
    }

    public function destroyTask(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Tarea eliminada.');
    }
}
