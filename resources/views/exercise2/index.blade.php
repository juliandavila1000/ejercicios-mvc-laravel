@extends('layouts.app')

@section('title', 'Calculadora de Propinas')

@section('content')
    <h1>Calculadora de Propinas</h1>

    <form method="POST" action="{{ route('exercise2.index') }}">
        @csrf
        <div class="form-group">
            <label for="monto">Monto de la cuenta ($):</label>
            <input type="number" id="monto" name="monto" step="0.01" min="0" required value="{{ old('monto', $resultado['monto'] ?? '') }}">
        </div>

        <div class="form-group">
            <label for="porcentaje">Porcentaje de propina (%):</label>
            <input type="number" id="porcentaje" name="porcentaje" step="1" min="0" max="100" required value="{{ old('porcentaje', $resultado['porcentaje'] ?? '') }}">
        </div>

        <button type="submit">Calcular</button>
    </form>

    @if ($resultado)
        <div class="resultado">
            <h3>Resultado</h3>
            <div class="resultado-item">
                <span>Monto de la cuenta:</span>
                <span>${{ number_format($resultado['monto'], 2) }}</span>
            </div>
            <div class="resultado-item">
                <span>Porcentaje de propina:</span>
                <span>{{ $resultado['porcentaje'] }}%</span>
            </div>
            <div class="resultado-item">
                <span>Propina:</span>
                <span>${{ number_format($resultado['propina'], 2) }}</span>
            </div>
            <div class="resultado-item">
                <span><strong>Total a pagar:</strong></span>
                <span><strong>${{ number_format($resultado['total'], 2) }}</strong></span>
            </div>
        </div>
    @endif

    <a href="{{ route('home') }}">
        <button class="btn-volver">Volver al Menú</button>
    </a>
@endsection

