<?php

namespace App\Models;

class Exercise5Model
{
    private $reservas = [];
    private $ultimoId = 0;
    private $horarios = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
    
    // Inicializa el modelo y carga las reservas desde la sesión
    public function __construct()
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        
        if (session()->has('reservas')) {
            $this->reservas = session('reservas');
            $this->ultimoId = session('ultimoIdReservas', 0);
        }
    }
    
    // Obtiene todas las reservas
    public function obtenerTodas()
    {
        return $this->reservas;
    }
    
    // Obtiene los horarios disponibles
    public function obtenerHorarios()
    {
        return $this->horarios;
    }
    
    // Crea una nueva reserva si está disponible
    public function crearReserva($fecha, $hora, $nombre, $email)
    {
        foreach ($this->reservas as $reserva) {
            if ($reserva['fecha'] === $fecha && $reserva['hora'] === $hora && !$reserva['cancelada']) {
                return false;
            }
        }
        
        $this->ultimoId++;
        $this->reservas[] = [
            'id' => $this->ultimoId,
            'fecha' => $fecha,
            'hora' => $hora,
            'nombre' => htmlspecialchars($nombre),
            'email' => htmlspecialchars($email),
            'cancelada' => false,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->guardar();
        return true;
    }
    
    // Cancela una reserva por ID
    public function cancelarReserva($id)
    {
        foreach ($this->reservas as &$reserva) {
            if ($reserva['id'] == $id) {
                $reserva['cancelada'] = true;
                break;
            }
        }
        $this->guardar();
    }
    
    // Obtiene la disponibilidad de los próximos 7 días
    public function obtenerDisponibilidad()
    {
        $disponibilidad = [];
        $fechaActual = date('Y-m-d');
        
        for ($i = 0; $i < 7; $i++) {
            $fecha = date('Y-m-d', strtotime($fechaActual . " +$i days"));
            $disponibilidad[$fecha] = [];
            
            foreach ($this->horarios as $hora) {
                $disponible = true;
                foreach ($this->reservas as $reserva) {
                    if ($reserva['fecha'] === $fecha && $reserva['hora'] === $hora && !$reserva['cancelada']) {
                        $disponible = false;
                        break;
                    }
                }
                $disponibilidad[$fecha][$hora] = $disponible;
            }
        }
        
        return $disponibilidad;
    }
    
    // Guarda las reservas en la sesión
    private function guardar()
    {
        session(['reservas' => $this->reservas]);
        session(['ultimoIdReservas' => $this->ultimoId]);
    }
}

