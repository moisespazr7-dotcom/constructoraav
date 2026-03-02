@extends('admin.layout')

@section('content')
<div class="card">
    <div class="section-title">Evaluaciones</div>
    <div class="actions" style="margin-bottom: 12px;">
        <a class="btn" href="{{ route('admin.evaluations.create') }}">Crear evaluacion</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyecto</th>
                <th>Oficio</th>
                <th>Cuadrilla</th>
                <th>Colaborador</th>
                <th>Tarea</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($items as $item)
            <tr>
                <td>#{{ $item->id }}</td>
                <td>{{ $item->project->name ?? '-' }}</td>
                <td>{{ $item->trade->name ?? '-' }}</td>
                <td>{{ $item->crew->name ?? '-' }}</td>
                <td>{{ $item->worker->name ?? '-' }}</td>
                <td>{{ $item->task->name ?? '-' }}</td>
                <td>{{ $item->evaluated_at ? \Illuminate\Support\Carbon::parse($item->evaluated_at)->format('d/m/Y') : '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="muted">No hay evaluaciones.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">{{ $items->links() }}</div>
</div>
@endsection
