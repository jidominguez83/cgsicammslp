<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Telefono;
use App\Models\Email;
use App\Models\ParticipacionProceso;
use Illuminate\Http\Request;


class ParticipanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function details($participante_id){
        $participante = Participante::find($participante_id);

        $telefonos = Telefono::select('telefono', 'tipo')
                                ->where('participante_id', $participante_id)
                                ->get();

        $emails = Email::select('email')
                        ->where('participante_id', $participante_id)
                        ->get();

        $participaciones = ParticipacionProceso::select('participacion_procesos.id AS participacion_id',
                                                        'ciclo',
                                                        'posicion',
                                                        'tipo_valoraciones.nombre AS nombre_valoracion',
                                                        'lenguas.nombre AS nombre_lengua',
                                                        'procesos.nombre AS nombre_proceso',
                                                        'tipo_funciones.nombre AS nombre_funcion')
                                                    ->join('valoracion_nivel_sostenimiento', 'valoracion_nivel_sostenimiento_id', '=', 'valoracion_nivel_sostenimiento.id')
                                                    ->join('tipo_valoraciones', 'tipo_valoracion_id', '=', 'tipo_valoraciones.id')
                                                    ->join('procesos', 'proceso_id', '=', 'procesos.id')
                                                    ->join('tipo_funciones', 'funcion_id', '=', 'tipo_funciones.id')
                                                    ->leftjoin('lenguas', 'lengua_id', '=', 'lenguas.id')
                                                    ->where('participante_id', $participante_id)
                                                    ->get();

        return view('participantes.details', [
            'participante' => $participante,
            'telefonos' => $telefonos,
            'emails' => $emails,
            'participaciones' => $participaciones
        ]); 
    }

    public function search(Request $request){
        $data = trim($request->valor);
        $results = Participante::select('id', 'curp', 'nombre', 'apellido_paterno', 'apellido_materno')
                                        ->where('curp', 'LIKE', $data.'%')
                                        ->take(10)
                                        ->get();

        return response()->json([
            'results' => $results
        ]);
    }
}