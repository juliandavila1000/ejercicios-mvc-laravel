<?php

namespace App\Http\Controllers;

use App\Models\Exercise6Model;
use Illuminate\Http\Request;

class Exercise6Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise6Model();
    }
    
    // Muestra las notas con filtros opcionales
    public function index(Request $request)
    {
        $categoria = $request->query('categoria', 'Todas');
        $busqueda = $request->query('busqueda', '');
        $notas = $this->model->obtenerNotas($categoria, $busqueda);
        $categorias = $this->model->obtenerCategorias();
        return view('exercise6.index', compact('notas', 'categorias', 'categoria', 'busqueda'));
    }
    
    // Crea una nueva nota
    public function crear(Request $request)
    {
        $titulo = $request->input('titulo', '');
        $contenido = $request->input('contenido', '');
        $categoria = $request->input('categoria', 'General');
        $this->model->crear($titulo, $contenido, $categoria);
        return redirect()->route('exercise6.index');
    }
    
    // Elimina una nota por ID
    public function eliminar(Request $request)
    {
        $id = $request->input('id', 0);
        $this->model->eliminar($id);
        return redirect()->route('exercise6.index');
    }
}

