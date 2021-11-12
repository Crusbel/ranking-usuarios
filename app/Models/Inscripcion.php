<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table = 'inscripciones';
    protected $fillable = ['estado'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }
}
