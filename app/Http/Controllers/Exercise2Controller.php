<?php

namespace App\Http\Controllers;

use App\Models\Exercise2Model;
use Illuminate\Http\Request;

class Exercise2Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise2Model();
    }
    
    // Muestra el formulario y calcula la propina
    public function index(Request $request)
    {
        $resultado = null;
        
        if ($request->isMethod('post')) {
            $monto = floatval($request->input('monto', 0));
            $porcentaje = floatval($request->input('porcentaje', 0));
            $resultado = $this->model->calcular($monto, $porcentaje);
        }
        
        return view('exercise2.index', compact('resultado'));
    }
}

