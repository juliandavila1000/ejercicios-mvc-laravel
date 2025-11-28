@extends('layouts.app')

@section('title', 'Generador de Contraseñas Seguras')

@section('content')
    <h1>Generador de Contraseñas Seguras</h1>

    <form method="POST" action="{{ route('exercise3.index') }}">
        @csrf
        <div class="form-group">
            <label for="longitud">Longitud de la contraseña (4-128):</label>
            <input type="number" id="longitud" name="longitud" min="4" max="128" value="{{ old('longitud', 12) }}" required>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="mayusculas" {{ old('mayusculas', true) ? 'checked' : '' }}>
                Incluir mayúsculas (A-Z)
            </label>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="minusculas" {{ old('minusculas', true) ? 'checked' : '' }}>
                Incluir minúsculas (a-z)
            </label>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="numeros" {{ old('numeros', true) ? 'checked' : '' }}>
                Incluir números (0-9)
            </label>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="especiales" {{ old('especiales', true) ? 'checked' : '' }}>
                Incluir caracteres especiales (!@#$...)
            </label>
        </div>

        <button type="submit">Generar Contraseña</button>
    </form>

    @if ($password)
        <div class="password-result">
            <h3>Tu contraseña generada:</h3>
            <div class="password-display" id="password">{{ $password }}</div>
            <button class="btn-copiar" onclick="copiarPassword()">Copiar al portapapeles</button>
        </div>
    @elseif ($password === null && request()->isMethod('post'))
        <div class="mensaje error">
            Por favor, selecciona al menos un tipo de carácter y una longitud válida (4-128).
        </div>
    @endif

    <a href="{{ route('home') }}">
        <button class="btn-volver">Volver al Menú</button>
    </a>
@endsection

@push('scripts')
<script>
function copiarPassword() {
    const passwordElement = document.getElementById('password');
    const text = passwordElement.textContent;
    
    navigator.clipboard.writeText(text).then(() => {
        alert('Contraseña copiada al portapapeles');
    }).catch(() => {
        alert('Error al copiar la contraseña');
    });
}
</script>
@endpush

