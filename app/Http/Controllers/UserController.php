<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $inputs = $request->input();
        $inputs["password"] = Hash::make(trim($request->password));
        $e = User::create($inputs);

        return response()->json([
            'mensaje' => 'Usuario guardado'
        ]);
    }

    public function show($id)
    {
        $datos = User::find($id);

        return response()->json([
            'datos' => $datos,
            'mensaje' => 'Usuario  encontrado',
        ]);
    }

    public function update(Request $request, $id)
    {
        $e = User::find($id);

        $e->first_name = $request->first_name;   
        $e->last_name  = $request->last_name;  
        $e->email      = $request->email;
        $e->password   = Hash::make($request->password);

        $e->save();

        return response()->json([
            'datos'   => $e,
            'mensaje' => 'Usuario creado correctamente',
        ]);
    }

    public function destroy($id)
    {

        $user = User::find($id);

        $user->delete();

        return response()->json([
            'datos'   => $user,
            'mensaje' => 'Se Borro el usuario '
        ]);
    }
}
