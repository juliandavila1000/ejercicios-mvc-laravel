@extends('layouts.app')

@section('title', 'Responder Encuesta')

@section('content')
    <h1>{{ $encuesta['titulo'] ?? 'Encuesta no encontrada' }}</h1>
    
    @if ($encuesta)
        <form method="POST" action="{{ route('exercise10.responder', ['id' => $encuesta['id']]) }}">
            @csrf
            @foreach ($encuesta['preguntas'] as $index => $pregunta)
                <div class="pregunta-item">
                    <label><strong>{{ $index + 1 }}. {{ $pregunta }}</strong></label>
                    <input type="text" name="respuestas[{{ $index }}]" required>
                </div>
            @endforeach
            
            <button type="submit">Enviar Respuestas</button>
        </form>
    @else
        <p class="sin-tareas">La encuesta no existe.</p>
    @endif
    
    <a href="{{ route('exercise10.index') }}"><button class="btn-volver">Volver</button></a>
@endsection

