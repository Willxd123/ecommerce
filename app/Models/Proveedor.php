<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion' ,
        'correo' ,
        'encargado',
    ];
<<<<<<< HEAD
    
=======

    //relacion uno a muchos
    public function productos(){
        return $this->hasMany(Producto::class);
    }

    //relacion uno a muchos
    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }
>>>>>>> 93c0cf327fc2c2f813d9b72a0e2fdff8fa79b885
}
