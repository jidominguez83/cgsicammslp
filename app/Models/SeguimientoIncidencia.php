<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incidencia;

class SeguimientoIncidencia extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'incidencia_id',
        'respuesta',
        'atendido_por',
        'added_at'
    ];

    public function incidencia(){
        return $this->belongsTo(Incidencia::class, 'id');
    }
}
