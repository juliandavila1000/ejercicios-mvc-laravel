<?php

namespace App\Http\Controllers;

use App\Models\Exercise4Model;
use Illuminate\Http\Request;

class Exercise4Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise4Model();
    }
    
    // Muestra la lista de gastos y el resumen mensual
    public function index()
    {
        $gastos = $this->model->obtenerTodos();
        $resumen = $this->model->obtenerResumenMensual();
        return view('exercise4.index', compact('gastos', 'resumen'));
    }
    
    // Agrega un nuevo gasto
    public function agregar(Request $request)
    {
        $monto = floatval($request->input('monto', 0));
        $descripcion = $request->input('descripcion', '');
        $categoria = $request->input('categoria', 'Otros');
        $fecha = $request->input('fecha', date('Y-m-d'));
        
        $this->model->agregar($monto, $descripcion, $categoria, $fecha);
        return redirect()->route('exercise4.index');
    }
    
    // Elimina un gasto por ID
    public function eliminar(Request $request)
    {
        $id = $request->input('id', 0);
        $this->model->eliminar($id);
        return redirect()->route('exercise4.index');
    }
}

