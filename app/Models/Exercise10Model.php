<?php

namespace App\Models;

class Exercise10Model
{
    private $encuestas = [];
    private $ultimoId = 0;
    
    // Inicializa el modelo y carga las encuestas desde la sesión
    public function __construct()
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        
        if (session()->has('encuestas')) {
            $this->encuestas = session('encuestas');
            $this->ultimoId = session('ultimoIdEncuestas', 0);
        }
    }
    
    // Obtiene todas las encuestas
    public function obtenerTodas()
    {
        return $this->encuestas;
    }
    
    // Obtiene una encuesta por ID
    public function obtenerPorId($id)
    {
        foreach ($this->encuestas as $encuesta) {
            if ($encuesta['id'] == $id) {
                return $encuesta;
            }
        }
        return null;
    }
    
    // Crea una nueva encuesta
    public function crear($titulo, $preguntas)
    {
        $this->ultimoId++;
        $this->encuestas[] = [
            'id' => $this->ultimoId,
            'titulo' => htmlspecialchars($titulo),
            'preguntas' => $preguntas,
            'respuestas' => [],
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->guardar();
    }
    
    // Agrega respuestas a una encuesta
    public function agregarRespuestas($id, $respuestas)
    {
        foreach ($this->encuestas as &$encuesta) {
            if ($encuesta['id'] == $id) {
                $encuesta['respuestas'][] = $respuestas;
                break;
            }
        }
        $this->guardar();
    }
    
    // Obtiene los resultados de una encuesta
    public function obtenerResultados($id)
    {
        $encuesta = $this->obtenerPorId($id);
        if (!$encuesta) return null;
        
        $resultados = [];
        foreach ($encuesta['preguntas'] as $index => $pregunta) {
            $resultados[$index] = [
                'pregunta' => $pregunta,
                'opciones' => []
            ];
            
            foreach ($encuesta['respuestas'] as $respuesta) {
                $opcion = $respuesta[$index] ?? '';
                if (!isset($resultados[$index]['opciones'][$opcion])) {
                    $resultados[$index]['opciones'][$opcion] = 0;
                }
                $resultados[$index]['opciones'][$opcion]++;
            }
        }
        
        return $resultados;
    }
    
    // Elimina una encuesta por ID
    public function eliminar($id)
    {
        $this->encuestas = array_filter($this->encuestas, function($encuesta) use ($id) {
            return $encuesta['id'] != $id;
        });
        $this->encuestas = array_values($this->encuestas);
        $this->guardar();
    }
    
    // Guarda las encuestas en la sesión
    private function guardar()
    {
        session(['encuestas' => $this->encuestas]);
        session(['ultimoIdEncuestas' => $this->ultimoId]);
    }
}

