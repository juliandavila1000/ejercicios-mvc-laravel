@extends('layouts.app')

@section('title', 'Ejercicios MVC Laravel')

@section('content')
    <h1>Ejercicios MVC Laravel</h1>
    <h2>Autor: Julian Alberto Davila Machado</h2>
    <h3>Lista de Ejercicios</h3>

    <div class="card">
        <h3>Ejercicio 1: Lista de Tareas</h3>
        <p>Crea una aplicación web que permita a los usuarios agregar, eliminar y marcar como completadas tareas de una lista.</p>
        <a href="{{ route('exercise1.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 2: Calculadora de Propinas</h3>
        <p>Desarrolla una aplicación que calcule automáticamente la propina basada en el monto total de la cuenta y el porcentaje de propina seleccionado por el usuario.</p>
        <a href="{{ route('exercise2.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 3: Generador de Contraseñas Seguras</h3>
        <p>Construye una herramienta que genere contraseñas seguras de forma aleatoria y las muestre al usuario, permitiendo ajustar la longitud y los tipos de caracteres.</p>
        <a href="{{ route('exercise3.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 4: Gestor de Gastos</h3>
        <p>Crea una aplicación para que los usuarios puedan registrar sus gastos diarios, categorizarlos y ver un resumen de sus gastos mensuales.</p>
        <a href="{{ route('exercise4.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 5: Sistema de Reservas</h3>
        <p>Diseña una aplicación para que los usuarios puedan reservar citas o servicios en línea, mostrando disponibilidad y permitiendo la confirmación de la reserva.</p>
        <a href="{{ route('exercise5.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 6: Gestor de Notas</h3>
        <p>Desarrolla una aplicación donde los usuarios puedan escribir y guardar notas, con la posibilidad de organizarlas en diferentes categorías y buscarlas fácilmente.</p>
        <a href="{{ route('exercise6.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 7: Calendario de Eventos</h3>
        <p>Crea un calendario interactivo donde los usuarios puedan agregar, editar y eliminar eventos, con funcionalidades como recordatorios y notificaciones.</p>
        <a href="{{ route('exercise7.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 8: Plataforma de Recetas</h3>
        <p>Construye un sitio web donde los usuarios puedan buscar, guardar y compartir recetas de cocina, con opciones para filtrar por tipo de comida, ingredientes, etc.</p>
        <a href="{{ route('exercise8.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 9: Juego de Memoria</h3>
        <p>Desarrolla un juego clásico de memoria donde los usuarios puedan emparejar cartas con imágenes, con diferentes niveles de dificultad y puntajes.</p>
        <a href="{{ route('exercise9.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 10: Plataforma de Encuestas</h3>
        <p>Desarrolla una aplicación que permita a los usuarios crear y responder encuestas en línea, con opciones para analizar los resultados y generar informes visuales.</p>
        <a href="{{ route('exercise10.index') }}" class="btn">Ver solución</a>
    </div>

    <div class="card">
        <h3>Ejercicio 11: Cronómetro Online</h3>
        <p>Crea una herramienta que funcione como un cronómetro en línea, con funciones de inicio, pausa, reinicio y registro de vueltas o tiempos parciales.</p>
        <a href="{{ route('exercise11.index') }}" class="btn">Ver solución</a>
    </div>
@endsection

