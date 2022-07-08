<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoFuncion;
use App\Models\Lengua;

class TipoValoracion extends Model
{
    use HasFactory;

    protected $table = 'tipo_valoraciones';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre'
    ];

    public function funcion(){
        return $this->belongsTo(TipoFuncion::class);
    }

    public function lengua(){
        return $this->belongsTo(Lengua::class);
    }
}
