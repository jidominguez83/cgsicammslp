<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParticipacionProceso;
use App\Models\Incidencia;

class Estatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'descripcion'
    ];

    public function participacion_procesos(){
        return $this->hasMany(ParticipacionProceso::class, 'estatus');
    }

    public function incidencias(){
        return $this->hasMany(Incidencia::class, 'estatus');
    }
}
