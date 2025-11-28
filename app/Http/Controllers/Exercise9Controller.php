<?php

namespace App\Http\Controllers;

use App\Models\Exercise9Model;
use Illuminate\Http\Request;

class Exercise9Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise9Model();
    }
    
    // Muestra el juego de memoria
    public function index(Request $request)
    {
        $nivel = $request->query('nivel', 'facil');
        return view('exercise9.index', compact('nivel'));
    }
    
    // Genera las cartas para el juego (respuesta JSON)
    public function iniciar(Request $request)
    {
        $nivel = $request->input('nivel', 'facil');
        $cartas = $this->model->generarCartas($nivel);
        return response()->json(['cartas' => $cartas]);
    }
}

