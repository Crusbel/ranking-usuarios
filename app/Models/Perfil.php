<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfiles';
    protected $fillable = ['nombre'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_perfil')->withTimestamps();
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
