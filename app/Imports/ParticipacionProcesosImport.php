<?php

namespace App\Imports;

use App\Models\ParticipacionProceso;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ParticipacionProcesosImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ParticipacionProceso([
            'curp' => $row['curp'],
            'rfc' => $row['rfc'],
            'folio' => $row['folio'],
            'nombre' => $row['nombre'],
            'apellido_paterno' => $row['apellido_paterno'],
            'apellido_materno' => $row['apellido_materno'],
            'puntaje_global' => $row['puntaje_global'],
            'posicion_ordenamiento' => $row['posicion_ordenamiento'],
            'curso_hab_docentes' => $row['curso_hab_docentes'],
            'mov_academica' => $row['mov_academica'],
            'exp_docente' => $row['exp_docente'],
            'cenni' => $row['cenni'],
            'iv_conocimientos_ap' => $row['iv_conocimientos_ap']
        ]);
    }

    public function batchSize(): int
    {
        return 5000;
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
