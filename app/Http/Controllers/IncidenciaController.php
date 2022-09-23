<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\SeguimientoIncidencia;
use App\Models\ParticipacionProceso;
use App\Models\Participante;
use core_reportbuilder\local\filters\select;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($participante_id, $participacion_id){
        $participante = Participante::find($participante_id);

        $participaciones = ParticipacionProceso::select('participacion_procesos.id AS participacion_id',
                                                        'participacion_procesos.ciclo',
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

        $incidencias = Incidencia::select('incidencias.*',
                                            'procesos.nombre AS nombre_proceso',
                                            'ciclo',
                                            'estatuses.descripcion AS desc_estatus')
                                    ->join('participacion_procesos', 'participacion_proceso_id', '=', 'participacion_procesos.id')
                                    ->join('estatuses', 'incidencias.estatus', '=', 'estatuses.id')
                                    ->join('valoracion_nivel_sostenimiento', 'valoracion_nivel_sostenimiento_id', '=', 'valoracion_nivel_sostenimiento.id')
                                    ->join('tipo_valoraciones', 'tipo_valoracion_id', '=', 'tipo_valoraciones.id')
                                    ->join('procesos', 'proceso_id', '=', 'procesos.id')
                                    ->where('participante_id', $participante_id)
                                    ->get();                                      

        return view('participantes.incidencias', [
            'participante' => $participante,
            'participacion_id' => $participacion_id,
            'participaciones' => $participaciones,
            'incidencias' => $incidencias
        ]);
    }

    public function save(Request $request){
        // Validación de los datos.
        /*$validate = $this->validate($request, [
            'participacion_proceso' => 'required',
            'descripcion' => 'required',
            'documento' => 'file|max:5000|mimes:pdf'
        ]);*/

        // Obteniendo datos de la incidencia.
        $participante = $request->input('participante');
        $participacion_proceso = $request->input('participacion_proceso');
        $descripcion = $request->input('descripcion');
        $estatus = 5;

        // Asignando valores al nuevo objeto Incidencia.
        $incidencia = new Incidencia();
        $incidencia->participacion_proceso_id = $participacion_proceso;
        $incidencia->descripcion = $descripcion;
        $incidencia->estatus = $estatus;

        $incidencia->save();

        $latest_incidencia = Incidencia::latest('created_at')->first();

        // Obteniendo datos para el seguimiento de la incidencia.
        $respuesta = "La solicitud de incidencia fue recibida.";
        $user = \Auth::user();

        // Asignando valores al nuevo objeto del seguimiento de la incidencia.
        $seguimiento = new SeguimientoIncidencia();
        $seguimiento->incidencia_id = $latest_incidencia->id;
        $seguimiento->respuesta = $respuesta;
        $seguimiento->atendido_por = $user->id;
        $seguimiento->added_at = date("Y-m-d h:i:s");

        $seguimiento->save();

        return redirect()->route('participantes.incidencias', [
            'participante_id' => $participante,
            'participacion_id' => $participacion_proceso]
            )
        ->with([
            'success' => 'La incidencia se guardó correctamente.'
        ]);

        // Obteniendo datos para el seguimiento de la incidencia.
        $documento = $request->documento;
        //$path = "";
        $requiere_respuesta = $request->requiere_respuesta;
    }
}