<?php

namespace App\Http\Controllers;

use App\Models\Exercise8Model;
use Illuminate\Http\Request;

class Exercise8Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise8Model();
    }
    
    // Muestra las recetas con filtros opcionales
    public function index(Request $request)
    {
        $tipo = $request->query('tipo', 'Todos');
        $ingrediente = $request->query('ingrediente', '');
        $recetas = $this->model->buscar($tipo, $ingrediente);
        $tipos = $this->model->obtenerTipos();
        return view('exercise8.index', compact('recetas', 'tipos', 'tipo', 'ingrediente'));
    }
    
    // Crea una nueva receta
    public function crear(Request $request)
    {
        $nombre = $request->input('nombre', '');
        $tipo = $request->input('tipo', '');
        $ingredientes = $request->input('ingredientes', '');
        $instrucciones = $request->input('instrucciones', '');
        $this->model->crear($nombre, $tipo, $ingredientes, $instrucciones);
        return redirect()->route('exercise8.index');
    }
    
    // Elimina una receta por ID
    public function eliminar(Request $request)
    {
        $id = $request->input('id', 0);
        $this->model->eliminar($id);
        return redirect()->route('exercise8.index');
    }
}

