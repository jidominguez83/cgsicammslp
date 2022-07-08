<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParticipacionProceso;
use App\Models\Estatus;

class Incidencia extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'participacion_proceso_id',
        'descripcion',
        'estatus',
    ];

    public function participacion_proceso(){
        return $this->belongsTo(ParticipacionProceso::class);
    }

    public function estatus(){
        return $this->belongsTo(Estatus::class, 'estatus');
    }
}
