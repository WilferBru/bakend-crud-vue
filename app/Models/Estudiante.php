<?php

namespace App\Models;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estudiante extends Model
{
    use HasFactory;

    public $table = "estudiantes";

    protected $fillable = [
        'nombre',  
        'apellido',
        'foto',    
        'curso_id'    
    ];

    public function Curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
