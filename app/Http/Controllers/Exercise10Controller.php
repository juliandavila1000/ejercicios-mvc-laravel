<?php

namespace App\Http\Controllers;

use App\Models\Exercise10Model;
use Illuminate\Http\Request;

class Exercise10Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise10Model();
    }
    
    // Muestra la lista de encuestas
    public function index()
    {
        $encuestas = $this->model->obtenerTodas();
        return view('exercise10.index', compact('encuestas'));
    }
    
    // Muestra el formulario para crear una encuesta
    public function crear(Request $request)
    {
        if ($request->isMethod('post')) {
            $titulo = $request->input('titulo', '');
            $preguntas = $request->input('preguntas', []);
            $this->model->crear($titulo, $preguntas);
            return redirect()->route('exercise10.index');
        }
        
        return view('exercise10.crear');
    }
    
    // Muestra el formulario para responder una encuesta
    public function responder(Request $request, $id)
    {
        $encuesta = $this->model->obtenerPorId($id);
        
        if ($request->isMethod('post')) {
            $respuestas = $request->input('respuestas', []);
            $this->model->agregarRespuestas($id, $respuestas);
            return redirect()->route('exercise10.resultados', ['id' => $id]);
        }
        
        return view('exercise10.responder', compact('encuesta'));
    }
    
    // Muestra los resultados de una encuesta
    public function resultados($id)
    {
        $encuesta = $this->model->obtenerPorId($id);
        $resultados = $this->model->obtenerResultados($id);
        return view('exercise10.resultados', compact('encuesta', 'resultados'));
    }
    
    // Elimina una encuesta por ID
    public function eliminar(Request $request)
    {
        $id = $request->input('id', 0);
        $this->model->eliminar($id);
        return redirect()->route('exercise10.index');
    }
}

