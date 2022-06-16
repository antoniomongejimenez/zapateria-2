<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapato extends Model
{
    use HasFactory;

    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    }

    public function lineas()
    {
        return $this->hasMany(Linea::class);
    }


}
