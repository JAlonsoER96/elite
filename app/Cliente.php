<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{

    /**
     * @author Jose Alonso Espinare Romero
     * @description modelo Cliente y sus propiedades
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre',
        'edad',
        'fecha_nacimiento',
        'sexo','ocupacion',
        'direccion','
        telefono',
        'email',
        'foto',
        'baja',
    ];
}
