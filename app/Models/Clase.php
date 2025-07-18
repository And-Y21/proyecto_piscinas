<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    public function profesor()
    {
        return $this->belongsTo(User::class, 'id_profesor');
    }
}

