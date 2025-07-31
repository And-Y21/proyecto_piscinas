<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    public function tipo()
    {
        return $this->belongsTo(TipoMembresia::class, 'id_tipo_membresia');
    }
}
