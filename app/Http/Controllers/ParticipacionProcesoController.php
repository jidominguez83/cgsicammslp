<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\TipoValoracion;
use App\Models\ParticipacionProceso;
use App\Models\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ParticipacionProcesoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($proceso_id, $ciclo, $valoracion_id){
        $participantes = ParticipacionProceso::select('participacion_procesos.*',
                                                        'curp',
                                                        'participantes.nombre',
                                                        'apellido_paterno',
                                                        'apellido_materno',
                                                        'participacion_procesos.participante_id AS participante_id',
                                                        'tipo_valoraciones.id AS valoracion_id',
                                                        'tipo_valoraciones.nombre AS valoracion_nombre',
                                                        'participacion_procesos.id AS participacion_id')
                                                ->join('participantes', 'participante_id', '=', 'participantes.id')
                                                ->join('valoracion_nivel_sostenimiento', 'valoracion_nivel_sostenimiento_id', '=', 'valoracion_nivel_sostenimiento.id')
                                                ->join('tipo_valoraciones', 'tipo_valoracion_id', '=', 'tipo_valoraciones.id')
                                                ->where('estatus', 1)
                                                ->where('ciclo', $ciclo)
                                                ->where('tipo_valoraciones.id', $valoracion_id)
                                                ->where('tipo_valoraciones.proceso_id', $proceso_id)
                                                ->paginate(10);
        
        $valoraciones = TipoValoracion::all();

        $proceso = Proceso::find($proceso_id);

        $num_participantes = count($participantes);

        if($num_participantes > 0){

            return view('participantes.list', [
                'participantes' => $participantes,
                'valoraciones' => $valoraciones,
                'valoracion_id' => $valoracion_id,
                'proceso_id' => $proceso_id,
                'ciclo' => $ciclo,
                'proceso' => $proceso,
                'num_participantes' => $num_participantes
            ]);

        } else {

            Session::flash('no-encontrado', 'No se ha encontrado ningún aspirante registrado para este proceso y tipo de valoración.');

            return view('participantes.list', [
                'participantes' => $participantes,
                'valoraciones' => $valoraciones,
                'valoracion_id' => $valoracion_id,
                'proceso_id' => $proceso_id,
                'ciclo' => $ciclo,
                'proceso' => $proceso,
                'num_participantes' => $num_participantes
            ]);

        }
    }

    public function detail($participacion_id){
        $participacion = ParticipacionProceso::select('participacion_procesos.*',
                                                        'participantes.curp',
                                                        'participantes.nombre',
                                                        'participantes.apellido_paterno',
                                                        'participantes.apellido_materno',
                                                        'tipo_valoraciones.nombre AS nombre_valoracion',
                                                        'lenguas.nombre AS nombre_lengua',
                                                        'procesos.id AS proceso_id',
                                                        'procesos.nombre AS nombre_proceso',
                                                        'tipo_funciones.nombre AS nombre_funcion')
                                                ->join('participantes', 'participante_id', '=', 'participantes.id')
                                                ->join('valoracion_nivel_sostenimiento', 'valoracion_nivel_sostenimiento_id', '=', 'valoracion_nivel_sostenimiento.id')
                                                ->join('tipo_valoraciones', 'tipo_valoracion_id', '=', 'tipo_valoraciones.id')
                                                ->join('procesos', 'proceso_id', '=', 'procesos.id')
                                                ->join('tipo_funciones', 'funcion_id', '=', 'tipo_funciones.id')
                                                ->leftjoin('lenguas', 'lengua_id', '=', 'lenguas.id')
                                                ->where('participacion_procesos.id', $participacion_id)
                                                ->first();

        $incidencias = Incidencia::select('descripcion')
                                    ->where('participacion_proceso_id', $participacion->id);

        return view('participantes.detail-proceso', [
            'participacion' => $participacion,
            'incidencias' => $incidencias
        ]);
    }

    public function importar($proceso_id, $ciclo){
        $proceso = Proceso::find($proceso_id);

        return view('participantes.importar-listas', [
            'proceso' => $proceso,
            'ciclo' => $ciclo
        ]);
    }

    public function subirLista(){
        
    }
}