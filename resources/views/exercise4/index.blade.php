@extends('layouts.app')

@section('title', 'Gestor de Gastos')

@section('content')
    <h1>Gestor de Gastos</h1>

    <h2>Agregar Nuevo Gasto</h2>
    <form method="POST" action="{{ route('exercise4.agregar') }}">
        @csrf
        <div class="form-group">
            <label for="monto">Monto ($):</label>
            <input type="number" id="monto" name="monto" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="Alimentación">Alimentación</option>
                <option value="Transporte">Transporte</option>
                <option value="Vivienda">Vivienda</option>
                <option value="Entretenimiento">Entretenimiento</option>
                <option value="Salud">Salud</option>
                <option value="Educación">Educación</option>
                <option value="Otros">Otros</option>
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" value="{{ date('Y-m-d') }}" required>
        </div>

        <button type="submit">Agregar Gasto</button>
    </form>

    <h2>Resumen del Mes Actual</h2>
    <div class="resumen">
        @if (!empty($resumen['porCategoria']))
            @foreach ($resumen['porCategoria'] as $categoria => $total)
                <div class="resumen-item">
                    <span>{{ $categoria }}</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
            @endforeach
            <div class="resumen-item total">
                <span>Total:</span>
                <span>${{ number_format($resumen['total'], 2) }}</span>
            </div>
        @else
            <p class="sin-tareas">No hay gastos registrados este mes.</p>
        @endif
    </div>

    <h2>Lista de Gastos</h2>
    @if (empty($gastos))
        <div class="sin-tareas">No hay gastos registrados. ¡Agrega uno nuevo!</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach (array_reverse($gastos) as $gasto)
                    <tr>
                        <td>{{ $gasto['fecha'] }}</td>
                        <td>{{ $gasto['descripcion'] }}</td>
                        <td>{{ $gasto['categoria'] }}</td>
                        <td>${{ number_format($gasto['monto'], 2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('exercise4.eliminar') }}" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $gasto['id'] }}">
                                <button type="submit" class="btn-eliminar">Eliminar</button>
                            </form>
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

