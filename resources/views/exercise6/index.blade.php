@extends('layouts.app')

@section('title', 'Gestor de Notas')

@section('content')
    <h1>Gestor de Notas</h1>

    <h2>Nueva Nota</h2>
    <form method="POST" action="{{ route('exercise6.crear') }}">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>

        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea id="contenido" name="contenido" required></textarea>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                @foreach ($categorias as $cat)
                    @if ($cat !== 'Todas')
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit">Crear Nota</button>
    </form>

    <h2>Buscar y Filtrar</h2>
    <form method="GET" action="{{ route('exercise6.index') }}" class="filtros">
        <select name="categoria">
            @foreach ($categorias as $cat)
                <option value="{{ $cat }}" {{ $categoria === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        
        <input type="text" name="busqueda" placeholder="Buscar en título o contenido..." value="{{ $busqueda }}">
        
        <button type="submit">Filtrar</button>
    </form>

    <h2>Mis Notas</h2>
    @if (empty($notas))
        <div class="sin-tareas">No hay notas que coincidan con tu búsqueda.</div>
    @else
        <div class="notas-grid">
            @foreach ($notas as $nota)
                <div class="nota-card">
                    <div class="nota-titulo">{{ $nota['titulo'] }}</div>
                    <div class="nota-contenido">{{ substr($nota['contenido'], 0, 100) }}{{ strlen($nota['contenido']) > 100 ? '...' : '' }}</div>
                    <div class="nota-meta">
                        <span>{{ $nota['categoria'] }}</span>
                        <span>{{ date('d/m/Y', strtotime($nota['fechaCreacion'])) }}</span>
                    </div>
                    <form method="POST" action="{{ route('exercise6.eliminar') }}" style="margin-top: 12px;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $nota['id'] }}">
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

