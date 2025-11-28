@extends('layouts.app')

@section('title', 'Plataforma de Recetas')

@section('content')
    <h1>Plataforma de Recetas</h1>

    <h2>Nueva Receta</h2>
    <form method="POST" action="{{ route('exercise8.crear') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la receta:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                @foreach ($tipos as $t)
                    @if ($t !== 'Todos')
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" required placeholder="Lista los ingredientes separados por comas o líneas"></textarea>
        </div>

        <div class="form-group">
            <label for="instrucciones">Instrucciones:</label>
            <textarea id="instrucciones" name="instrucciones" required placeholder="Escribe el paso a paso de la receta"></textarea>
        </div>

        <button type="submit">Guardar Receta</button>
    </form>

    <h2>Buscar Recetas</h2>
    <form method="GET" action="{{ route('exercise8.index') }}" class="filtros">
        <select name="tipo">
            @foreach ($tipos as $t)
                <option value="{{ $t }}" {{ $tipo === $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        
        <input type="text" name="ingrediente" placeholder="Buscar por ingrediente..." value="{{ $ingrediente }}">
        
        <button type="submit">Filtrar</button>
    </form>

    <h2>Mis Recetas</h2>
    @if (empty($recetas))
        <div class="sin-tareas">No hay recetas que coincidan con tu búsqueda.</div>
    @else
        <div class="recetas-grid">
            @foreach ($recetas as $receta)
                <div class="receta-card">
                    <span class="receta-tipo">{{ $receta['tipo'] }}</span>
                    <div class="receta-nombre">{{ $receta['nombre'] }}</div>
                    
                    <div class="receta-seccion">
                        <strong>Ingredientes:</strong>
                        <p>{{ substr($receta['ingredientes'], 0, 100) }}{{ strlen($receta['ingredientes']) > 100 ? '...' : '' }}</p>
                    </div>
                    
                    <div class="receta-seccion">
                        <strong>Instrucciones:</strong>
                        <p>{{ substr($receta['instrucciones'], 0, 100) }}{{ strlen($receta['instrucciones']) > 100 ? '...' : '' }}</p>
                    </div>
                    
                    <form method="POST" action="{{ route('exercise8.eliminar') }}" style="margin-top: 12px;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $receta['id'] }}">
                        <button type="submit" class="btn-eliminar" style="width: 100%;">Eliminar</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('home') }}">
        <button class="btn-volver">Volver al Menú</button>
    </a>
@endsection

