@extends('admin.layout')

@section('content')
<div class="card">
    <div class="section-title">Solicitudes de renta</div>
    <form class="filters" method="GET" action="{{ route('admin.rentals.index') }}">
        <div style="min-width: 160px;">
            <select name="status" class="input">
                <option value="">Todos los estados</option>
                <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>Nuevo</option>
                <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>En proceso</option>
                <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Cerrado</option>
            </select>
        </div>
        <div style="min-width: 240px; flex:1;">
            <input class="input" name="q" value="{{ request('q') }}" placeholder="Buscar por nombre, telefono o equipo">
        </div>
        <button class="btn" type="submit">Filtrar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Solicitante</th>
                <th>Equipo</th>
                <th>Detalles</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($items as $item)
            <tr>
                <td>
                    <strong>{{ $item->name }}</strong>
                    <small>{{ $item->phone }}</small>
                </td>
                <td>{{ $item->equipment }}</td>
                <td>
                    <div>{{ $item->date_range }}</div>
                    <small>{{ $item->details }}</small>
                </td>
                <td>
                    <span class="badge status-{{ $item->status }}">{{ str_replace('_', ' ', $item->status) }}</span>
                    <small>{{ $item->created_at->format('d/m/Y H:i') }}</small>
                </td>
                <td>
                    <form class="actions" method="POST" action="{{ route('admin.rentals.update', $item) }}">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="input" style="min-width:140px;">
                            <option value="new" {{ $item->status === 'new' ? 'selected' : '' }}>Nuevo</option>
                            <option value="in_progress" {{ $item->status === 'in_progress' ? 'selected' : '' }}>En proceso</option>
                            <option value="closed" {{ $item->status === 'closed' ? 'selected' : '' }}>Cerrado</option>
                        </select>
                        <button class="btn" type="submit">Actualizar</button>
                    </form>
                    <form method="POST" action="{{ route('admin.rentals.destroy', $item) }}" style="margin-top:8px;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="muted">No hay registros.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">{{ $items->links() }}</div>
</div>
@endsection
