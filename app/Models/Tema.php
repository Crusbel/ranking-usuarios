<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function evaluacion()
    {
        return $this->hasOne(Evaluacion::class);
    }
}
