@extends('layouts.app')

@section('title', 'Cronómetro Online')

@section('content')
    <h1>Cronómetro Online</h1>
    
    <div class="cronometro" id="cronometro">00:00:00.000</div>
    
    <div class="controles">
        <button class="btn-iniciar" id="btnIniciar" onclick="iniciar()">Iniciar</button>
        <button class="btn-pausar" id="btnPausar" onclick="pausar()" disabled>Pausar</button>
        <button class="btn-reiniciar" onclick="reiniciar()">Reiniciar</button>
        <button class="btn-vuelta" onclick="registrarVuelta()">Vuelta</button>
    </div>
    
    <div class="vueltas" id="vueltas">
        <h3>Vueltas Registradas</h3>
        <div id="listaVueltas"></div>
    </div>
    
    <a href="{{ route('home') }}"><button class="btn-volver">Volver al Menú</button></a>
@endsection

@push('scripts')
<script>
    let inicio = null;
    let pausado = false;
    let tiempoPausado = 0;
    let intervalo = null;
    let vueltas = [];
    
    // Actualiza el display del cronómetro
    function actualizar() {
        if (!inicio || pausado) return;
        
        const ahora = Date.now();
        const transcurrido = ahora - inicio + tiempoPausado;
        
        const horas = Math.floor(transcurrido / 3600000);
        const minutos = Math.floor((transcurrido % 3600000) / 60000);
        const segundos = Math.floor((transcurrido % 60000) / 1000);
        const milisegundos = transcurrido % 1000;
        
        document.getElementById('cronometro').textContent = 
            String(horas).padStart(2, '0') + ':' +
            String(minutos).padStart(2, '0') + ':' +
            String(segundos).padStart(2, '0') + '.' +
            String(milisegundos).padStart(3, '0');
    }
    
    let inicioPausa = null;
    
    // Inicia o reanuda el cronómetro
    function iniciar() {
        if (!inicio) {
            inicio = Date.now();
        } else if (pausado) {
            tiempoPausado += Date.now() - inicioPausa;
            pausado = false;
        }
        
        intervalo = setInterval(actualizar, 10);
        document.getElementById('btnIniciar').disabled = true;
        document.getElementById('btnPausar').disabled = false;
    }
    
    // Pausa el cronómetro
    function pausar() {
        if (pausado) return;
        
        pausado = true;
        inicioPausa = Date.now();
        clearInterval(intervalo);
        document.getElementById('btnIniciar').disabled = false;
        document.getElementById('btnPausar').disabled = true;
    }
    
    // Reinicia el cronómetro
    function reiniciar() {
        inicio = null;
        pausado = false;
        tiempoPausado = 0;
        clearInterval(intervalo);
        document.getElementById('cronometro').textContent = '00:00:00.000';
        document.getElementById('btnIniciar').disabled = false;
        document.getElementById('btnPausar').disabled = true;
        vueltas = [];
        document.getElementById('listaVueltas').innerHTML = '';
    }
    
    // Registra una vuelta
    function registrarVuelta() {
        if (!inicio || pausado) return;
        
        const ahora = Date.now();
        const transcurrido = ahora - inicio + tiempoPausado;
        
        const horas = Math.floor(transcurrido / 3600000);
        const minutos = Math.floor((transcurrido % 3600000) / 60000);
        const segundos = Math.floor((transcurrido % 60000) / 1000);
        const milisegundos = transcurrido % 1000;
        
        const tiempo = String(horas).padStart(2, '0') + ':' +
                      String(minutos).padStart(2, '0') + ':' +
                      String(segundos).padStart(2, '0') + '.' +
                      String(milisegundos).padStart(3, '0');
        
        vueltas.push({ numero: vueltas.length + 1, tiempo: tiempo });
        
        const div = document.createElement('div');
        div.className = 'vuelta-item';
        div.textContent = `Vuelta ${vueltas.length}: ${tiempo}`;
        document.getElementById('listaVueltas').appendChild(div);
    }
</script>
@endpush

