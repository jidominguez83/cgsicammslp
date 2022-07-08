<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incidencia;

class SeguimientoIncidencia extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'respuesta',
        'atendido_por'
    ];

    public function incidencia(){
        return $this->belongsTo(Incidencia::class, 'id');
    }
}
