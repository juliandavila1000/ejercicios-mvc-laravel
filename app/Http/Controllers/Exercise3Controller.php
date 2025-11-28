<?php

namespace App\Http\Controllers;

use App\Models\Exercise3Model;
use Illuminate\Http\Request;

class Exercise3Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise3Model();
    }
    
    // Genera una contraseña aleatoria según los criterios seleccionados
    public function index(Request $request)
    {
        $password = null;
        
        if ($request->isMethod('post')) {
            $longitud = intval($request->input('longitud', 12));
            $incluirMayusculas = $request->has('mayusculas');
            $incluirMinusculas = $request->has('minusculas');
            $incluirNumeros = $request->has('numeros');
            $incluirEspeciales = $request->has('especiales');
            
            $password = $this->model->generar($longitud, $incluirMayusculas, $incluirMinusculas, $incluirNumeros, $incluirEspeciales);
        }
        
        return view('exercise3.index', compact('password'));
    }
}

