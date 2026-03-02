@extends('admin.layout')

@section('content')
<div class="grid-3">
    <div class="card">
        <div class="muted">Contactos</div>
        <div style="font-size: 28px; font-weight: 700;">{{ $contacts }}</div>
    </div>
    <div class="card">
        <div class="muted">Rentas</div>
        <div style="font-size: 28px; font-weight: 700;">{{ $rentals }}</div>
    </div>
    <div class="card">
        <div class="muted">Materiales</div>
        <div style="font-size: 28px; font-weight: 700;">{{ $materials }}</div>
    </div>
</div>

<div class="card" style="margin-top: 20px;">
    <div class="section-title">Accesos rapidos</div>
    <div class="actions">
        <a class="btn" href="{{ route('admin.contacts.index') }}">Ver contactos</a>
        <a class="btn btn-outline" href="{{ route('admin.evaluations.create') }}">Nueva evaluacion</a>
    </div>
</div>
@endsection
