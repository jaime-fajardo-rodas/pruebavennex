<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'id',
        'tipo_identificacion_id',
        'numero_identificacion',
        'nombres',
        'apellidos',
        'telefono',
        'correo_electronico',
        'fecha_nacimiento',
        'recibir_boletin',
        'observaciones_generales',
        'foto'
    ];

    public function identificacion()
    {
        return $this->hasOne(Identificaciones::class,'id','tipo_identificacion_id');
    }
    

}
