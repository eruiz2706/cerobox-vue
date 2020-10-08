<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="clientes";

    protected $fillable = [
        'nombre',
        'imagen',
        'cedula',
        'email',
        'telefono',
        'observaciones'  
    ];

    protected $hidden = ['created_at','updated_at'];
}
