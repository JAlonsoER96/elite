<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Cliente extends Model
{

    /**
     * @author Jose Alonso Espinare Romero
     * @description modelo Cliente y sus propiedades
     */
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
