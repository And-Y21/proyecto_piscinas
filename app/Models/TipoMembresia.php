<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMembresia extends Model
{
    protected $table = 'tipos_membresia';
    protected $fillable = ['nombre', 'clases_adquiridas'];

    public function membresias()
    {
        return $this->hasMany(Membresia::class, 'id_tipo_membresia');
    }
}
