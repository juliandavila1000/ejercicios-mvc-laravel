@extends('layouts.app')

@section('title', 'Resultados de Encuesta')

@section('content')
    <h1>Resultados: {{ $encuesta['titulo'] ?? 'Encuesta no encontrada' }}</h1>
    
    @if ($encuesta && $resultados)
        <p>Total de respuestas: {{ count($encuesta['respuestas']) }}</p>
        
        @foreach ($resultados as $index => $resultado)
            <div class="card">
                <h3>{{ $index + 1 }}. {{ $resultado['pregunta'] }}</h3>
                
                @if (empty($resultado['opciones']))
                    <p>No hay respuestas para esta pregunta.</p>
                @else
                    @foreach ($resultado['opciones'] as $opcion => $cantidad)
                        <div class="opcion-resultado">
                            <strong>{{ $opcion }}</strong>: {{ $cantidad }} respuesta(s)
                            @php
                                $total = count($encuesta['respuestas']);
                                $porcentaje = $total > 0 ? ($cantidad / $total) * 100 : 0;
                            @endphp
                            <div class="barra" style="width: {{ $porcentaje }}%">{{ number_format($porcentaje, 1) }}%</div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    @else
        <p class="sin-tareas">La encuesta no existe o no hay resultados.</p>
    @endif
    
    <a href="{{ route('exercise10.index') }}"><button class="btn-volver">Volver</button></a>
@endsection

