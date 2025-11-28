<?php

namespace App\Models;

class Exercise8Model
{
    private $recetas = [];
    private $ultimoId = 0;
    
    // Inicializa el modelo y carga las recetas desde la sesión
    public function __construct()
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        
        if (session()->has('recetas')) {
            $this->recetas = session('recetas');
            $this->ultimoId = session('ultimoIdRecetas', 0);
        }
    }
    
    // Obtiene los tipos de recetas disponibles
    public function obtenerTipos()
    {
        return ['Todos', 'Desayuno', 'Almuerzo', 'Cena', 'Postre', 'Bebida', 'Snack'];
    }
    
    // Busca recetas por tipo e ingrediente
    public function buscar($tipo = 'Todos', $ingrediente = '')
    {
        $filtradas = $this->recetas;
        
        if ($tipo !== 'Todos') {
            $filtradas = array_filter($filtradas, function($receta) use ($tipo) {
                return $receta['tipo'] === $tipo;
            });
        }
        
        if (!empty($ingrediente)) {
            $ingredienteLower = strtolower($ingrediente);
            $filtradas = array_filter($filtradas, function($receta) use ($ingredienteLower) {
                return strpos(strtolower($receta['ingredientes']), $ingredienteLower) !== false;
            });
        }
        
        return array_values($filtradas);
    }
    
    // Crea una nueva receta
    public function crear($nombre, $tipo, $ingredientes, $instrucciones)
    {
        $this->ultimoId++;
        $this->recetas[] = [
            'id' => $this->ultimoId,
            'nombre' => htmlspecialchars($nombre),
            'tipo' => htmlspecialchars($tipo),
            'ingredientes' => htmlspecialchars($ingredientes),
            'instrucciones' => htmlspecialchars($instrucciones),
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->guardar();
    }
    
    // Elimina una receta por ID
    public function eliminar($id)
    {
        $this->recetas = array_filter($this->recetas, function($receta) use ($id) {
            return $receta['id'] != $id;
        });
        $this->recetas = array_values($this->recetas);
        $this->guardar();
    }
    
    // Guarda las recetas en la sesión
    private function guardar()
    {
        session(['recetas' => $this->recetas]);
        session(['ultimoIdRecetas' => $this->ultimoId]);
    }
}

