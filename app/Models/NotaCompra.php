<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'precio' ,
        'producto_id' ,
        'proveedor_id',
    ];
}