<?php

namespace App\Models;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    public $table = "cursos";

    protected $fillable = [
        'curso',
        'horas'
    ];

    public function Estudiantes(): HasMany
    {
        return $this->hasMany(Estudiante::class, 'curso_id');
    }
}
