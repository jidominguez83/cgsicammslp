<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoValoracion;

class TipoFuncion extends Model
{
    use HasFactory;

    protected $table = 'tipo_funciones';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre'
    ];

    public function tipo_valoraciones(){
        return $this->hasMany(TipoValoracion::class);
    }
}
