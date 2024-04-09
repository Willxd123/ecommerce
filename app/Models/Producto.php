<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    //asignacion masiva
    protected $fillable = [
        'nombre',
        'stock' ,
        'descripcion' ,
        'precio',
        'imagen',
        'subcategoria_id',
    ];

    //relacion uno a muchos inversa
    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }


    //relacion uno a muchos
    public function variantes(){
        return $this->hasMany(Variante::class);
    }

    //relacion muchos a muchos 
    public function opcions(){
        return $this->belongsToMany(Opcion::class)
                    ->withPivot('valor')
                    ->withTimestamps();
    }
}
