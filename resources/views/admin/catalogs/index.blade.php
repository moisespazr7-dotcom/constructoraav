@extends('admin.layout')

@section('content')
<div class="card">
    <div class="section-title">Catalogos base</div>

    <div class="section-title">Proyectos</div>
    <form method="POST" action="{{ route('admin.catalogs.projects.store') }}" class="actions" style="margin-bottom: 12px;">
        @csrf
        <input class="input" name="name" placeholder="Nombre del proyecto" style="max-width: 280px;">
        <button class="btn" type="submit">Agregar</button>
    </form>
    <div class="actions" style="flex-wrap: wrap;">
        @foreach ($projects as $project)
            <form method="POST" action="{{ route('admin.catalogs.projects.destroy', $project) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline" type="submit">{{ $project->name }}</button>
            </form>
        @endforeach
    </div>

    <div class="section-title">Oficios</div>
    <form method="POST" action="{{ route('admin.catalogs.trades.store') }}" class="actions" style="margin-bottom: 12px;">
        @csrf
        <input class="input" name="name" placeholder="Nombre del oficio" style="max-width: 280px;">
        <button class="btn" type="submit">Agregar</button>
    </form>
    <div class="actions" style="flex-wrap: wrap;">
        @foreach ($trades as $trade)
            <form method="POST" action="{{ route('admin.catalogs.trades.destroy', $trade) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline" type="submit">{{ $trade->name }}</button>
            </form>
        @endforeach
    </div>

    <div class="section-title">Cuadrillas</div>
    <form method="POST" action="{{ route('admin.catalogs.crews.store') }}" class="actions" style="margin-bottom: 12px;">
        @csrf
        <input class="input" name="name" placeholder="Nombre de cuadrilla" style="max-width: 280px;">
        <button class="btn" type="submit">Agregar</button>
    </form>
    <div class="actions" style="flex-wrap: wrap;">
        @foreach ($crews as $crew)
            <form method="POST" action="{{ route('admin.catalogs.crews.destroy', $crew) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline" type="submit">{{ $crew->name }}</button>
            </form>
        @endforeach
    </div>

    <div class="section-title">Colaboradores</div>
    <form method="POST" action="{{ route('admin.catalogs.workers.store') }}" class="form-row" style="margin-bottom: 12px;">
        @csrf
        <input class="input" name="name" placeholder="Nombre del colaborador">
        <select name="trade_id" class="input">
            <option value="">Oficio (opcional)</option>
            @foreach ($trades as $trade)
                <option value="{{ $trade->id }}">{{ $trade->name }}</option>
            @endforeach
        </select>
        <select name="crew_id" class="input">
            <option value="">Cuadrilla (opcional)</option>
            @foreach ($crews as $crew)
                <option value="{{ $crew->id }}">{{ $crew->name }}</option>
            @endforeach
        </select>
        <button class="btn" type="submit">Agregar</button>
    </form>
    <table class="table" style="margin-bottom: 20px;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Oficio</th>
                <th>Cuadrilla</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($workers as $worker)
            <tr>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->trade->name ?? '-' }}</td>
                <td>{{ $worker->crew->name ?? '-' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.catalogs.workers.destroy', $worker) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="muted">Sin colaboradores.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="section-title">Tareas</div>
    <form method="POST" action="{{ route('admin.catalogs.tasks.store') }}" class="actions" style="margin-bottom: 12px;">
        @csrf
        <input class="input" name="name" placeholder="Nombre de la tarea" style="max-width: 280px;">
        <button class="btn" type="submit">Agregar</button>
    </form>
    <div class="actions" style="flex-wrap: wrap;">
        @foreach ($tasks as $task)
            <form method="POST" action="{{ route('admin.catalogs.tasks.destroy', $task) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline" type="submit">{{ $task->name }}</button>
            </form>
        @endforeach
    </div>
</div>
@endsection
