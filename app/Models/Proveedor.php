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

    //relacion uno a muchos
    public function productos(){
        return $this->hasMany(Producto::class);
    }

    //relacion uno a muchos
    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }
}
