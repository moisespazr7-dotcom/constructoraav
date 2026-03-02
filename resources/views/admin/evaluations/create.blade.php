@extends('admin.layout')

@section('content')
<div class="card">
    <div class="section-title">Nueva evaluacion</div>
    <form method="POST" action="{{ route('admin.evaluations.store') }}">
        @csrf
        <div class="form-row" style="margin-bottom: 12px;">
            <div>
                <label class="muted">Proyecto</label>
                <select name="project_id" class="input">
                    <option value="">Selecciona</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="muted">Oficio</label>
                <select name="trade_id" class="input">
                    <option value="">Selecciona</option>
                    @foreach ($trades as $trade)
                        <option value="{{ $trade->id }}">{{ $trade->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="muted">Cuadrilla</label>
                <select name="crew_id" class="input">
                    <option value="">Selecciona</option>
                    @foreach ($crews as $crew)
                        <option value="{{ $crew->id }}">{{ $crew->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="muted">Colaborador</label>
                <select name="worker_id" class="input">
                    <option value="">Selecciona</option>
                    @foreach ($workers as $worker)
                        <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="muted">Tarea</label>
                <select name="task_id" class="input">
                    <option value="">Selecciona</option>
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="muted">Fecha</label>
                <input type="date" name="evaluated_at" class="input">
            </div>
        </div>

        <div style="margin-bottom: 12px;">
            <label class="muted">Notas</label>
            <textarea name="notes" rows="3"></textarea>
        </div>

        <div class="section-title">Items de evaluacion</div>
        <div id="items" data-index="3">
            @for ($i = 0; $i < 3; $i++)
                <div class="card" style="margin-bottom: 12px;">
                    <div class="form-row">
                        <div style="grid-column: span 2;">
                            <label class="muted">Pregunta</label>
                            <input name="items[{{ $i }}][question]" class="input" placeholder="Ej. Uso de EPP">
                        </div>
                        <div>
                            <label class="muted">Score</label>
                            <select name="items[{{ $i }}][score]" class="input">
                                <option value="ok">Ok</option>
                                <option value="warn">Advertencia</option>
                                <option value="bad">Critico</option>
                            </select>
                        </div>
                        <div>
                            <label class="muted">Comentario</label>
                            <input name="items[{{ $i }}][comment]" class="input" placeholder="Opcional">
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <div class="actions" style="margin-bottom: 16px;">
            <button class="btn btn-outline" type="button" id="add-item">Agregar pregunta</button>
        </div>

        <button class="btn" type="submit">Guardar evaluacion</button>
    </form>
</div>

<script>
    const addBtn = document.getElementById('add-item');
    const container = document.getElementById('items');

    addBtn?.addEventListener('click', () => {
        const index = Number(container.dataset.index || '0');
        const wrapper = document.createElement('div');
        wrapper.className = 'card';
        wrapper.style.marginBottom = '12px';
        wrapper.innerHTML = `
            <div class="form-row">
                <div style="grid-column: span 2;">
                    <label class="muted">Pregunta</label>
                    <input name="items[${index}][question]" class="input" placeholder="Ej. Uso de EPP">
                </div>
                <div>
                    <label class="muted">Score</label>
                    <select name="items[${index}][score]" class="input">
                        <option value="ok">Ok</option>
                        <option value="warn">Advertencia</option>
                        <option value="bad">Critico</option>
                    </select>
                </div>
                <div>
                    <label class="muted">Comentario</label>
                    <input name="items[${index}][comment]" class="input" placeholder="Opcional">
                </div>
            </div>
        `;
        container.appendChild(wrapper);
        container.dataset.index = index + 1;
    });
</script>
@endsection
