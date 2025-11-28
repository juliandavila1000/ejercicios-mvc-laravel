<?php

namespace App\Models;

class Exercise6Model
{
    private $notas = [];
    private $ultimoId = 0;
    
    // Inicializa el modelo y carga las notas desde la sesión
    public function __construct()
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        
        if (session()->has('notas')) {
            $this->notas = session('notas');
            $this->ultimoId = session('ultimoIdNotas', 0);
        }
    }
    
    // Obtiene las notas filtradas por categoría y búsqueda
    public function obtenerNotas($categoria = 'Todas', $busqueda = '')
    {
        $filtradas = $this->notas;
        
        if ($categoria !== 'Todas') {
            $filtradas = array_filter($filtradas, function($nota) use ($categoria) {
                return $nota['categoria'] === $categoria;
            });
        }
        
        if (!empty($busqueda)) {
            $busquedaLower = strtolower($busqueda);
            $filtradas = array_filter($filtradas, function($nota) use ($busquedaLower) {
                return strpos(strtolower($nota['titulo']), $busquedaLower) !== false ||
                       strpos(strtolower($nota['contenido']), $busquedaLower) !== false;
            });
        }
        
        return array_values($filtradas);
    }
    
    // Obtiene las categorías disponibles
    public function obtenerCategorias()
    {
        $categorias = ['Todas', 'General', 'Trabajo', 'Personal', 'Estudio', 'Recordatorios'];
        return $categorias;
    }
    
    // Crea una nueva nota
    public function crear($titulo, $contenido, $categoria)
    {
        $this->ultimoId++;
        $this->notas[] = [
            'id' => $this->ultimoId,
            'titulo' => htmlspecialchars($titulo),
            'contenido' => htmlspecialchars($contenido),
            'categoria' => htmlspecialchars($categoria),
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->guardar();
    }
    
    // Elimina una nota por ID
    public function eliminar($id)
    {
        $this->notas = array_filter($this->notas, function($nota) use ($id) {
            return $nota['id'] != $id;
        });
        $this->notas = array_values($this->notas);
        $this->guardar();
    }
    
    // Guarda las notas en la sesión
    private function guardar()
    {
        session(['notas' => $this->notas]);
        session(['ultimoIdNotas' => $this->ultimoId]);
    }
}

