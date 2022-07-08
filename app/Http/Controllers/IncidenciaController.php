<?php

namespace App\Http\Controllers;

use App\Models\ParticipacionProceso;
use App\Models\Participante;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
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
        return view('participantes.incidencias', [
            'participante' => $participante,
            'participacion_id' => $participacion_id,
            'participaciones' => $participaciones
        ]);
    }

    public function save(Request $request){
        // Validación de los datos.
        $validate = $this->validate($request, [
            'participacion_proceso' => 'required',
            'descripcion' => 'required',
            'documento' => 'file|max:5000|mimes:pdf'
        ]);

        // Obteniendo datos de la incidencia.
        $participacion_proceso = $request->participacion_proceso;
        $descripcion = $request->descripcion;
        $estatus = 1;

        // Obteniendo datos para el seguimiento de la incidencia.
        //$incidencia_id = $incidencia->id;
        $respuesta = "La solicitud de incidencia fue recibida.";
        $atendido_por = \Auth::user();

        // Obteniendo datos para el seguimiento de la incidencia.
        $documento = $request->documento;
        //$path = "";
        $requiere_respuesta = $request->requiere_respuesta;
    }
}
