<?php

namespace App\Models;

class Exercise7Model
{
    private $eventos = [];
    private $ultimoId = 0;
    
    // Inicializa el modelo y carga los eventos desde la sesión
    public function __construct()
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        
        if (session()->has('eventos')) {
            $this->eventos = session('eventos');
            $this->ultimoId = session('ultimoIdEventos', 0);
        }
    }
    
    // Obtiene los eventos de un mes específico
    public function obtenerEventosPorMes($mes)
    {
        $eventosMes = [];
        foreach ($this->eventos as $evento) {
            $mesEvento = substr($evento['fecha'], 0, 7);
            if ($mesEvento === $mes) {
                $eventosMes[] = $evento;
            }
        }
        return $eventosMes;
    }
    
    // Obtiene los eventos de una fecha específica
    public function obtenerEventosPorFecha($fecha)
    {
        $eventosFecha = [];
        foreach ($this->eventos as $evento) {
            if ($evento['fecha'] === $fecha) {
                $eventosFecha[] = $evento;
            }
        }
        return $eventosFecha;
    }
    
    // Agrega un nuevo evento
    public function agregarEvento($titulo, $descripcion, $fecha, $hora)
    {
        $this->ultimoId++;
        $this->eventos[] = [
            'id' => $this->ultimoId,
            'titulo' => htmlspecialchars($titulo),
            'descripcion' => htmlspecialchars($descripcion),
            'fecha' => $fecha,
            'hora' => $hora
        ];
        $this->guardar();
    }
    
    // Elimina un evento por ID
    public function eliminarEvento($id)
    {
        $this->eventos = array_filter($this->eventos, function($evento) use ($id) {
            return $evento['id'] != $id;
        });
        $this->eventos = array_values($this->eventos);
        $this->guardar();
    }
    
    // Guarda los eventos en la sesión
    private function guardar()
    {
        session(['eventos' => $this->eventos]);
        session(['ultimoIdEventos' => $this->ultimoId]);
    }
}

