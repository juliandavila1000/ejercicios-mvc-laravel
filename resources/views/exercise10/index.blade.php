@extends('layouts.app')

@section('title', 'Plataforma de Encuestas')

@section('content')
    <h1>Plataforma de Encuestas</h1>
    
    <div class="card">
        <a href="{{ route('exercise10.crear') }}"><button>Crear Nueva Encuesta</button></a>
    </div>
    
    <div class="card">
        <h2>Encuestas Disponibles</h2>
        @if (empty($encuestas))
            <p>No hay encuestas. ¡Crea una nueva!</p>
        @else
            <div class="encuestas-lista">
                @foreach ($encuestas as $encuesta)
                    <div class="encuesta-item">
                        <div class="encuesta-titulo">{{ $encuesta['titulo'] }}</div>
                        <p>Preguntas: {{ count($encuesta['preguntas']) }} | Respuestas: {{ count($encuesta['respuestas']) }}</p>
                        <div class="encuesta-acciones">
                            <a href="{{ route('exercise10.responder', ['id' => $encuesta['id']]) }}">
                                <button>Responder</button>
                            </a>
                            <a href="{{ route('exercise10.resultados', ['id' => $encuesta['id']]) }}">
                                <button>Resultados</button>
                            </a>
                            <form method="POST" action="{{ route('exercise10.eliminar') }}" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $encuesta['id'] }}">
                                <button type="submit" class="btn-eliminar">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    
    <a href="{{ route('home') }}"><button class="btn-volver">Volver al Menú</button></a>
@endsection

