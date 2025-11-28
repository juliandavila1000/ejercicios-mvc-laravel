@extends('layouts.app')

@section('title', 'Calendario de Eventos')

@section('content')
    <h1>Calendario de Eventos</h1>
    
    <div class="card">
        <h2>Nuevo Evento</h2>
        <form method="POST" action="{{ route('exercise7.agregar') }}">
            @csrf
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="titulo" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion"></textarea>
            </div>
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="fecha" required>
            </div>
            <div class="form-group">
                <label>Hora</label>
                <input type="time" name="hora" required>
            </div>
            <button type="submit">Agregar Evento</button>
        </form>
    </div>
    
    <div class="card">
        <div class="navegacion">
            <a href="{{ route('exercise7.index', ['mes' => date('Y-m', strtotime($mes . '-01 -1 month'))]) }}">
                <button>Mes Anterior</button>
            </a>
            <h2>
                @php
                    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                    $mesNumero = date('n', strtotime($mes . '-01')) - 1;
                    $anio = date('Y', strtotime($mes . '-01'));
                    echo $meses[$mesNumero] . ' ' . $anio;
                @endphp
            </h2>
            <a href="{{ route('exercise7.index', ['mes' => date('Y-m', strtotime($mes . '-01 +1 month'))]) }}">
                <button>Mes Siguiente</button>
            </a>
        </div>
        
        <div class="calendario">
            <div class="dia-semana">Dom</div>
            <div class="dia-semana">Lun</div>
            <div class="dia-semana">Mar</div>
            <div class="dia-semana">Mié</div>
            <div class="dia-semana">Jue</div>
            <div class="dia-semana">Vie</div>
            <div class="dia-semana">Sáb</div>
            
            @php
                // Calcular días del calendario
                $primerDia = date('w', strtotime($mes . '-01'));
                $diasMes = date('t', strtotime($mes . '-01'));
                $mesAnterior = date('Y-m', strtotime($mes . '-01 -1 month'));
                $diasMesAnterior = date('t', strtotime($mesAnterior . '-01'));
                
                // Días del mes anterior
                for ($i = $primerDia - 1; $i >= 0; $i--) {
                    $dia = $diasMesAnterior - $i;
                    echo '<div class="dia otro-mes"><div class="dia-numero">' . $dia . '</div></div>';
                }
                
                // Días del mes actual
                for ($dia = 1; $dia <= $diasMes; $dia++) {
                    $fecha = $mes . '-' . str_pad($dia, 2, '0', STR_PAD_LEFT);
                    $eventosDia = array_filter($eventos, function($e) use ($fecha) {
                        return $e['fecha'] === $fecha;
                    });
                    
                    echo '<div class="dia">';
                    echo '<div class="dia-numero">' . $dia . '</div>';
                    foreach ($eventosDia as $evento) {
                        echo '<div class="evento" title="' . htmlspecialchars($evento['titulo']) . '">' . 
                             htmlspecialchars($evento['hora'] . ' - ' . substr($evento['titulo'], 0, 15)) . '</div>';
                    }
                    echo '</div>';
                }
                
                // Completar última fila
                $totalCeldas = $primerDia + $diasMes;
                $diasRestantes = 7 - ($totalCeldas % 7);
                if ($diasRestantes < 7) {
                    for ($dia = 1; $dia <= $diasRestantes; $dia++) {
                        echo '<div class="dia otro-mes"><div class="dia-numero">' . $dia . '</div></div>';
                    }
                }
            @endphp
        </div>
    </div>
    
    <div class="card">
        <h2>Eventos del Mes</h2>
        <div class="eventos-lista">
            @if (empty($eventos))
                <p>No hay eventos este mes.</p>
            @else
                @foreach ($eventos as $evento)
                    <div class="evento-item">
                        <strong>{{ $evento['titulo'] }}</strong>
                        <p>{{ $evento['descripcion'] }}</p>
                        <small>{{ date('d/m/Y', strtotime($evento['fecha'])) }} a las {{ $evento['hora'] }}</small>
                        <form method="POST" action="{{ route('exercise7.eliminar') }}" style="margin-top: 10px;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $evento['id'] }}">
                            <input type="hidden" name="mes" value="{{ $mes }}">
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
    <a href="{{ route('home') }}">
        <button class="btn-volver">Volver al Menú</button>
    </a>
@endsection

