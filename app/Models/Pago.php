<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_clase');
    }
}
