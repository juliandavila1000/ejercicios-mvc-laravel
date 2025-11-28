@extends('layouts.app')

@section('title', 'Crear Encuesta')

@section('content')
    <h1>Crear Nueva Encuesta</h1>
    
    <form method="POST" action="{{ route('exercise10.crear') }}">
        @csrf
        <div class="form-group">
            <label for="titulo">Título de la Encuesta:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        
        <h3>Preguntas</h3>
        <div id="preguntas-container">
            <div class="form-group">
                <label>Pregunta 1:</label>
                <input type="text" name="preguntas[]" required>
            </div>
        </div>
        
        <button type="button" onclick="agregarPregunta()">Agregar Pregunta</button>
        <button type="submit">Crear Encuesta</button>
    </form>
    
    <a href="{{ route('exercise10.index') }}"><button class="btn-volver">Volver</button></a>
@endsection

@push('scripts')
<script>
    let numeroPregunta = 1;
    
    function agregarPregunta() {
        numeroPregunta++;
        const container = document.getElementById('preguntas-container');
        const div = document.createElement('div');
        div.className = 'form-group';
        div.innerHTML = `
            <label>Pregunta ${numeroPregunta}:</label>
            <input type="text" name="preguntas[]" required>
        `;
        container.appendChild(div);
    }
</script>
@endpush

