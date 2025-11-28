@extends('layouts.app')

@section('title', 'Juego de Memoria')

@section('content')
    <h1>Juego de Memoria</h1>
    
    <div class="controles">
        <select id="nivel">
            <option value="facil" {{ $nivel === 'facil' ? 'selected' : '' }}>Fácil (4 pares)</option>
            <option value="medio" {{ $nivel === 'medio' ? 'selected' : '' }}>Medio (6 pares)</option>
            <option value="dificil" {{ $nivel === 'dificil' ? 'selected' : '' }}>Difícil (8 pares)</option>
        </select>
        <button onclick="iniciarJuego()">Nuevo Juego</button>
    </div>
    
    <div class="estadisticas">
        <div>Movimientos: <span id="movimientos">0</span></div>
        <div>Pares encontrados: <span id="pares">0</span></div>
    </div>
    
    <div id="tablero" class="tablero {{ $nivel }}"></div>
    
    <a href="{{ route('home') }}">
        <button class="btn-volver">Volver al Menú</button>
    </a>
@endsection

@push('scripts')
<script>
    let cartas = [];
    let cartasReveladas = [];
    let movimientos = 0;
    let paresEncontrados = 0;
    let bloqueado = false;
    
    function iniciarJuego() {
        const nivel = document.getElementById('nivel').value;
        const tablero = document.getElementById('tablero');
        tablero.className = 'tablero ' + nivel;
        
        fetch('{{ route('exercise9.iniciar') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ nivel: nivel })
        })
        .then(r => r.json())
        .then(data => {
            cartas = data.cartas;
            cartasReveladas = [];
            movimientos = 0;
            paresEncontrados = 0;
            bloqueado = false;
            actualizarEstadisticas();
            renderizarTablero();
        });
    }
    
    function renderizarTablero() {
        const tablero = document.getElementById('tablero');
        tablero.innerHTML = '';
        
        cartas.forEach((carta, index) => {
            const div = document.createElement('div');
            div.className = 'carta';
            if (carta.revelada) div.classList.add('revelada');
            if (carta.emparejada) div.classList.add('emparejada');
            div.textContent = carta.revelada || carta.emparejada ? carta.emoji : '?';
            div.onclick = () => revelarCarta(index);
            tablero.appendChild(div);
        });
    }
    
    function revelarCarta(index) {
        if (bloqueado || cartas[index].revelada || cartas[index].emparejada) return;
        
        cartas[index].revelada = true;
        cartasReveladas.push(index);
        movimientos++;
        actualizarEstadisticas();
        renderizarTablero();
        
        if (cartasReveladas.length === 2) {
            bloqueado = true;
            setTimeout(() => {
                const [i1, i2] = cartasReveladas;
                if (cartas[i1].emoji === cartas[i2].emoji) {
                    cartas[i1].emparejada = true;
                    cartas[i2].emparejada = true;
                    paresEncontrados++;
                    actualizarEstadisticas();
                    
                    if (paresEncontrados === cartas.length / 2) {
                        alert('¡Felicidades! Has completado el juego en ' + movimientos + ' movimientos.');
                    }
                } else {
                    cartas[i1].revelada = false;
                    cartas[i2].revelada = false;
                }
                cartasReveladas = [];
                bloqueado = false;
                renderizarTablero();
            }, 1000);
        }
    }
    
    function actualizarEstadisticas() {
        document.getElementById('movimientos').textContent = movimientos;
        document.getElementById('pares').textContent = paresEncontrados;
    }
    
    // Iniciar juego al cargar
    window.onload = iniciarJuego;
</script>
@endpush

