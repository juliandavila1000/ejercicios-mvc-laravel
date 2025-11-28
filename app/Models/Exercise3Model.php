<?php

namespace App\Models;

class Exercise3Model
{
    // Genera una contraseña aleatoria según los criterios especificados
    public function generar($longitud, $mayusculas, $minusculas, $numeros, $especiales)
    {
        if ($longitud < 4 || $longitud > 128) {
            return null;
        }
        
        if (!$mayusculas && !$minusculas && !$numeros && !$especiales) {
            return null;
        }
        
        $caracteres = '';
        if ($mayusculas) $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($minusculas) $caracteres .= 'abcdefghijklmnopqrstuvwxyz';
        if ($numeros) $caracteres .= '0123456789';
        if ($especiales) $caracteres .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
        
        $password = '';
        $max = strlen($caracteres) - 1;
        
        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[random_int(0, $max)];
        }
        
        return $password;
    }
}

