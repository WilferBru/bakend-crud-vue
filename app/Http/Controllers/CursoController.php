<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    
    public function index()
    {
        return Curso::select('id', 'curso', 'horas', 'created_at')->orderBy('created_at', 'desc')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'curso'    => 'required',
            'horas'  => 'required',
        ]);

        // return $validate;
        $datos = Curso::create($validate);

        return response()->json([
            'datos'  => $datos,
            'mensaje'=>"Se agrego el Curso.",
        ]);
    }

    public function show(Curso $curso)
    {
        // Esta consulta me muestra solo los estudiantes asociados a un curso
        $datos = Curso::with('Estudiantes')->find($curso->id); 

        $num_estudiantes = $curso->Estudiantes()->count(); //Aqui consultamos el numero de estudiantes de un curso

        // Esta consulta me muestra el curso y sus estudiantes
        $curso->load('estudiantes');

        return response()->json([            
            'mesange' => 'Este es el curso '.$curso->curso,
            'num_estudiantes' => $num_estudiantes,
            'datos'   => $datos
        ]);
    }

    public function edit(Curso $curso)
    {
        //
    }
     
    public function update(Request $request, Curso $curso)
    {
        $validate = $request->validate([
            'curso'    => 'required',
            'horas'  => 'required',
        ]);

        // return $validate;
        $datos = $curso->update($validate);

        return response()->json([
            'datos'  => $datos,
            'mensaje'=>"Se edito el Curso.",
        ]);
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return response()->json([
            'mensaje'=>"Se eleimino el Curso ".$curso->curso,
        ]);
    }
}
