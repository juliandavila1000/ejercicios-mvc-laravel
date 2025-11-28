<?php

namespace App\Http\Controllers;

use App\Models\Exercise7Model;
use Illuminate\Http\Request;

class Exercise7Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise7Model();
    }
    
    // Muestra el calendario de eventos del mes seleccionado
    public function index(Request $request)
    {
        $mes = $request->query('mes', date('Y-m'));
        $eventos = $this->model->obtenerEventosPorMes($mes);
        return view('exercise7.index', compact('mes', 'eventos'));
    }
    
    // Agrega un nuevo evento
    public function agregar(Request $request)
    {
        $titulo = $request->input('titulo', '');
        $descripcion = $request->input('descripcion', '');
        $fecha = $request->input('fecha', '');
        $hora = $request->input('hora', '');
        $this->model->agregarEvento($titulo, $descripcion, $fecha, $hora);
        return redirect()->route('exercise7.index', ['mes' => substr($fecha, 0, 7)]);
    }
    
    // Elimina un evento por ID
    public function eliminar(Request $request)
    {
        $id = $request->input('id', 0);
        $mes = $request->input('mes', date('Y-m'));
        $this->model->eliminarEvento($id);
        return redirect()->route('exercise7.index', ['mes' => $mes]);
    }
}

