<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identificaciones extends Model
{	
	protected $table = 'identificaciones';
    protected $fillable = [
        'id',
        'descripcion',
    ];

}
