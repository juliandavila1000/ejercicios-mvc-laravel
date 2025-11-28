<?php

namespace App\Http\Controllers;

use App\Models\Exercise1Model;
use Illuminate\Http\Request;

class Exercise1Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise1Model();
    }
    
    // Muestra la lista de tareas
    public function index()
    {
        $tareas = $this->model->obtenerTodas();
        return view('exercise1.index', compact('tareas'));
    }
    
    // Agrega una nueva tarea
    public function agregar(Request $request)
    {
        $descripcion = $request->input('descripcion', '');
        if (!empty($descripcion)) {
            $this->model->agregar($descripcion);
        }
        return redirect()->route('exercise1.index');
    }
    
    // Elimina una tarea por ID
    public function eliminar(Request $request)
    {
        $id = $request->input('id', 0);
        $this->model->eliminar($id);
        return redirect()->route('exercise1.index');
    }
    
    // Marca o desmarca una tarea como completada
    public function completar(Request $request)
    {
        $id = $request->input('id', 0);
        $this->model->marcarCompletada($id);
        return redirect()->route('exercise1.index');
    }
}

