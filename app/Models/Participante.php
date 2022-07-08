<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Email;
use App\Models\Telefono;
use App\Models\ParticipacionProceso;

class Participante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'curp',
        'rfc',
        'nombre',
        'apellido_paterno',
        'apellido_materno'
    ];

    public function emails(){
        return $this->hasMany(Email::class);
    }

    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }

    public function participacion_procesos(){
        return $this->hasMany(ParticipacionProceso::class);
    }
}