<?php

namespace App\Models;

class Exercise2Model
{
    // Calcula la propina y el total a pagar
    public function calcular($monto, $porcentaje)
    {
        if ($monto <= 0 || $porcentaje < 0) {
            return null;
        }
        
        $propina = ($monto * $porcentaje) / 100;
        $total = $monto + $propina;
        
        return [
            'monto' => $monto,
            'porcentaje' => $porcentaje,
            'propina' => $propina,
            'total' => $total
        ];
    }
}

