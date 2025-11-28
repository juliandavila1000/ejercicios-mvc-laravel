<?php

namespace App\Http\Controllers;

use App\Models\Exercise5Model;
use Illuminate\Http\Request;

class Exercise5Controller extends Controller
{
    private $model;
    
    public function __construct()
    {
        $this->model = new Exercise5Model();
    }
    
    // Muestra las reservas y disponibilidad
    public function index(Request $request)
    {
        $mensaje = $request->query('mensaje');
        $reservas = $this->model->obtenerTodas();
        $disponibilidad = $this->model->obtenerDisponibilidad();
        return view('exercise5.index', compact('reservas', 'disponibilidad', 'mensaje'));
    }
    
    // Crea una nueva reserva
    public function reservar(Request $request)
    {
        $fecha = $request->input('fecha', '');
        $hora = $request->input('hora', '');
        $nombre = $request->input('nombre', '');
        $email = $request->input('email', '');
        
        if ($this->model->crearReserva($fecha, $hora, $nombre, $email)) {
            return redirect()->route('exercise5.index', ['mensaje' => 'reservado']);
        } else {
            return redirect()->route('exercise5.index', ['mensaje' => 'error']);
        }
    }
    
    // Cancela una reserva
    public function cancelar(Request $request)
    {
        $id = $request->input('id', 0);
        $this->model->cancelarReserva($id);
        return redirect()->route('exercise5.index');
    }
}

