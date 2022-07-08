<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estatus;
use App\Models\Incidencia;
use App\Models\Participante;
use App\Models\Proceso;
use App\Models\TipoValoracion;

class ParticipacionProceso extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'participante_id',
        'valoracion_nivel_sostenimiento_id',
        'ciclo',
        'folio_federal',
        'p_global',
        'posicion',
        'estatus',
        'motivo_baja'
    ];

    public function estatus(){
        return $this->belongsTo(Estatus::class, 'estatus');
    }

    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

    public function participante(){
        return $this->belongsTo(Participante::class);
    }

    public function proceso(){
        return $this->belongsTo(Proceso::class);
    }

    public function tipo_valoracion(){
        return $this->belongsTo(TipoValoracion::class);
    }
}
