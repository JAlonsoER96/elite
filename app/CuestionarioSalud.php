<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioSalud extends Model
{

    public $table='cuestionarios_salud';

    protected $primaryKey = 'id';
    protected $fillable = [
        'idc',
        'enfermedad_cronica',
        'enfermedad_respiratoria',
        'impedimento_fisico',
        'enfermedad_cardiovascular',
        'lesion_muscular',
        'lesion_osea',
        'estado_salud'
    ];
}
