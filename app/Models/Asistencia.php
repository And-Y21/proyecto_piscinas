<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'id_clase',
        'id_usuario',
        'id_profesor',
        'id_membresia',
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function profesor() {
        return $this->belongsTo(User::class, 'id_profesor');
    }

    public function clase() {
        return $this->belongsTo(Clase::class, 'id_clase');
    }
}
