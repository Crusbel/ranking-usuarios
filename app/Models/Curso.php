<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'curso_perfil')->withTimestamps();
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function temas()
    {
        return $this->hasMany(Temas::class);
    }
}
