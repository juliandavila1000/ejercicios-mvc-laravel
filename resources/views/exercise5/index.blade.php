@extends('layouts.app')

@section('title', 'Sistema de Reservas')

@section('content')
    <h1>Sistema de Reservas</h1>

    @if ($mensaje === 'reservado')
        <div class="mensaje exito">¡Reserva realizada con éxito!</div>
    @elseif ($mensaje === 'error')
        <div class="mensaje error">El horario seleccionado no está disponible. Por favor, elige otro.</div>
    @endif

    <h2>Nueva Reserva</h2>
    <form method="POST" action="{{ route('exercise5.reservar') }}">
        @csrf
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" min="{{ date('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora:</label>
            <select id="hora" name="hora" required>
                @foreach ($disponibilidad[array_key_first($disponibilidad)] ?? [] as $hora => $disponible)
                    <option value="{{ $hora }}">{{ $hora }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <button type="submit">Reservar</button>
    </form>

    <h2>Disponibilidad (Próximos 7 días)</h2>
    @foreach ($disponibilidad as $fecha => $horarios)
        <h3>{{ date('l, d \d\e F \d\e Y', strtotime($fecha)) }}</h3>
        <div class="disponibilidad">
            @foreach ($horarios as $hora => $disponible)
                <div class="slot {{ $disponible ? 'disponible' : 'ocupado' }}">
                    {{ $hora }}<br>
                    <small>{{ $disponible ? 'Disponible' : 'Ocupado' }}</small>
                </div>
            @endforeach
        </div>
    @endforeach

    <h2>Mis Reservas</h2>
    @if (empty($reservas))
        <div class="sin-tareas">No tienes reservas registradas.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach (array_reverse($reservas) as $reserva)
                    <tr>
                        <td>{{ $reserva['fecha'] }}</td>
                        <td>{{ $reserva['hora'] }}</td>
                        <td>{{ $reserva['nombre'] }}</td>
                        <td>{{ $reserva['email'] }}</td>
                        <td>
                            @if ($reserva['cancelada'])
                                <span style="color: #B85450;">Cancelada</span>
                            @else
                                <span style="color: #5A8C6F;">Activa</span>
                            @endif
                        </td>
                        <td>
                            @if (!$reserva['cancelada'])
                                <form method="POST" action="{{ route('exercise5.cancelar') }}" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $reserva['id'] }}">
                                    <button type="submit" class="btn-cancelar">Cancelar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('home') }}">
        <button class="btn-volver">Volver al Menú</button>
    </a>
@endsection

