@extends('layouts.app')

@section('title', 'Lista de Tareas')

@section('content')
    <h1>Lista de Tareas</h1>

    <form method="POST" action="{{ route('exercise1.agregar') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="descripcion" placeholder="Nueva tarea..." required>
        </div>
        <button type="submit">Agregar Tarea</button>
    </form>

    <br>

    @if (empty($tareas))
        <div class="sin-tareas">No hay tareas. ¡Agrega una nueva!</div>
    @else
        @foreach ($tareas as $tarea)
            <div class="tarea-item {{ $tarea['completada'] ? 'completada' : '' }}">
                <span class="tarea-texto">{{ $tarea['descripcion'] }}</span>
                
                <div class="tarea-acciones">
                    <form method="POST" action="{{ route('exercise1.completar') }}" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tarea['id'] }}">
                        <button type="submit" class="btn-completar">
                            {{ $tarea['completada'] ? 'Desmarcar' : 'Completar' }}
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('exercise1.eliminar') }}" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tarea['id'] }}">
                        <button type="submit" class="btn-eliminar">Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

    <a href="{{ route('home') }}">
        <button class="btn-volver">Volver al Menú</button>
    </a>
@endsection

