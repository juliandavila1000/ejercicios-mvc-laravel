<?php

namespace App\Models;

class Exercise4Model
{
    private $gastos = [];
    private $ultimoId = 0;
    
    // Inicializa el modelo y carga los gastos desde la sesión
    public function __construct()
    {
        if (!session()->isStarted()) {
            session()->start();
        }
        
        if (session()->has('gastos')) {
            $this->gastos = session('gastos');
            $this->ultimoId = session('ultimoIdGastos', 0);
        }
    }
    
    // Obtiene todos los gastos
    public function obtenerTodos()
    {
        return $this->gastos;
    }
    
    // Agrega un nuevo gasto
    public function agregar($monto, $descripcion, $categoria, $fecha)
    {
        $this->ultimoId++;
        $this->gastos[] = [
            'id' => $this->ultimoId,
            'monto' => $monto,
            'descripcion' => htmlspecialchars($descripcion),
            'categoria' => htmlspecialchars($categoria),
            'fecha' => $fecha
        ];
        $this->guardar();
    }
    
    // Elimina un gasto por ID
    public function eliminar($id)
    {
        $this->gastos = array_filter($this->gastos, function($gasto) use ($id) {
            return $gasto['id'] != $id;
        });
        $this->gastos = array_values($this->gastos);
        $this->guardar();
    }
    
    // Obtiene el resumen de gastos del mes actual por categoría
    public function obtenerResumenMensual()
    {
        $resumen = [];
        $mesActual = date('Y-m');
        
        foreach ($this->gastos as $gasto) {
            $mesGasto = substr($gasto['fecha'], 0, 7);
            if ($mesGasto === $mesActual) {
                $categoria = $gasto['categoria'];
                if (!isset($resumen[$categoria])) {
                    $resumen[$categoria] = 0;
                }
                $resumen[$categoria] += $gasto['monto'];
            }
        }
        
        $total = array_sum($resumen);
        return ['porCategoria' => $resumen, 'total' => $total];
    }
    
    // Guarda los gastos en la sesión
    private function guardar()
    {
        session(['gastos' => $this->gastos]);
        session(['ultimoIdGastos' => $this->ultimoId]);
    }
}

