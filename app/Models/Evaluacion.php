<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    protected $table = 'evaluaciones';

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }

    public function historial()
    {
        return $this->hasMany(Historial::class);
    }
}
