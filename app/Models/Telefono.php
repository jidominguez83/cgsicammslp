<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participante;

class Telefono extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'participante_id',
        'telefono',
        'tipo'
    ];

    public function participante(){
        return $this->belongsTo(Participante::class);
    }
}
