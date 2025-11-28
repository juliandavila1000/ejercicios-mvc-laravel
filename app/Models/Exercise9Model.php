<?php

namespace App\Models;

class Exercise9Model
{
    private $niveles = [
        'facil' => 8,
        'medio' => 12,
        'dificil' => 16
    ];
    
    private $emojis = ['🍎', '🍌', '🍇', '🍊', '🍓', '🍉', '🍑', '🍒', '🥝', '🍍', '🥭', '🍐', '🍋', '🍈', '🥥', '🫐'];
    
    // Genera las cartas para el juego según el nivel de dificultad
    public function generarCartas($nivel)
    {
        $numPares = $this->niveles[$nivel] ?? 8;
        $numPares = $numPares / 2;
        
        $emojisSeleccionados = array_slice($this->emojis, 0, $numPares);
        $cartas = [];
        
        foreach ($emojisSeleccionados as $emoji) {
            $cartas[] = $emoji;
            $cartas[] = $emoji;
        }
        
        shuffle($cartas);
        
        $cartasConId = [];
        foreach ($cartas as $index => $emoji) {
            $cartasConId[] = [
                'id' => $index,
                'emoji' => $emoji,
                'revelada' => false,
                'emparejada' => false
            ];
        }
        
        return $cartasConId;
    }
}

