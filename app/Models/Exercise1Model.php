<?php

namespace App\Models;

class Exercise1Model
{
    private $tareas = [];
    private $ultimoId = 0;
    
    // Inicializa el modelo y carga las tareas desde la sesión
    public function __construct()
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        
        if (session()->has('tareas')) {
            $this->tareas = session('tareas');
            $this->ultimoId = session('ultimoIdTareas', 0);
        }
    }
    
    // Obtiene todas las tareas
    public function obtenerTodas()
    {
        return $this->tareas;
    }
    
    // Agrega una nueva tarea
    public function agregar($descripcion)
    {
        $this->ultimoId++;
        $this->tareas[] = [
            'id' => $this->ultimoId,
            'descripcion' => htmlspecialchars($descripcion),
            'completada' => false
        ];
        $this->guardar();
    }
    
    // Elimina una tarea por ID
    public function eliminar($id)
    {
        $this->tareas = array_values(array_filter($this->tareas, function($tarea) use ($id) {
            return $tarea['id'] != $id;
        }));
        $this->guardar();
    }
    
    // Marca o desmarca una tarea como completada
    public function marcarCompletada($id)
    {
        foreach ($this->tareas as &$tarea) {
            if ($tarea['id'] == $id) {
                $tarea['completada'] = !$tarea['completada'];
                break;
            }
        }
        $this->guardar();
    }
    
    // Guarda las tareas en la sesión
    private function guardar()
    {
        session(['tareas' => $this->tareas]);
        session(['ultimoIdTareas' => $this->ultimoId]);
    }
}

