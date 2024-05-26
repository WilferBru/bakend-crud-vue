<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    
    public function index()
    {
        // return Estudiante::join('cursos', 'cursos.id', '=', 'estudiantes.curso_id')
        // ->select('estudiantes.id', 'apellido', 'foto', 'nombre', 'cursos.curso', 'estudiantes.created_at')->orderBy('estudiantes.created_at', 'desc')->get();
        
        return Estudiante::select('id', 'nombre', 'apellido', 'foto', 'curso_id', 'created_at')
        ->with('Curso:id,curso')->orderBy('estudiantes.created_at', 'desc')->get();
        
        // return Estudiante::select('id', 'nombre', 'apellido', 'foto', 'curso_id')
        // ->with(['Curso'=>function($q){
        //     $q->select('id', 'curso');
        // }])->get();
    }
  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nombre'    => 'required',
            'apellido'  => 'required',
            'foto'      => 'required',
            'curso_id'  => 'required'
        ]);

        // return $validate;
        $datos = Estudiante::create($validate);

        return response()->json([
            'datos'  => $datos,
            'mensaje'=>"Se agrego el estudiante.",
        ]);
    }

    public function show(Estudiante $estudiante)
    {
        return response()->json([            
            'mesange' => 'Estos son los datos de '.$estudiante->nombre,
            'datos'   => $estudiante
        ]);
    }

    public function edit(Estudiante $estudiante)
    {
        //
    }
     
    public function update(Request $request, Estudiante $estudiante)
    {
        $validate = $request->validate([
            'nombre'    => 'required',
            'apellido'  => 'required',
            'foto'      => 'required',
            'curso_id'  => 'required'
        ]);

        $estudiante->update($validate);

        return response()->json([
            'datos'  => $estudiante,
            'mensaje'=>"Actualizado estudiante",
        ],);
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return response()->json([
            'Mensaje' => 'Se Elimino '.$estudiante->nombre
        ]);
        
    }
}
