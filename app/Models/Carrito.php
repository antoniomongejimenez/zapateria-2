<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    public function zapato()
    {
        return $this->belongsTo(Zapato::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
