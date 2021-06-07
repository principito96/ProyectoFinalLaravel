<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuarios::orderBy('nomusu')->paginate(5);
        return view('usuarios.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Perfil::getArrayIdNombre();
        return view('usuarios.create',compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.- Validamos
        $request->validate([
            'nomusu' => ['required', 'string', 'min:3', 'max:50', 'unique:usuarios,nomusu'],
            'localidad' => ['required', 'string', 'min:3', 'max:150'],
            'mail' => ['required', 'string', 'min:5', 'max:60'],
            'perfil_id'=>['required']
        ]);
        //2.- Procesar
        try {
            Usuarios::create($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('usuarios.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('usuarios.index')->with("mensaje", "¡¡¡Usuario creado correctamente!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuario)
    {
        $perfil = Perfil::getArrayIdNombre();
        return view('usuarios.edit', compact('perfil','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuario)
    {
        //1.- Validamos
        $request->validate([
            'nomusu' => ['required', 'string', 'min:3', 'max:50', 'unique:usuarios,nomusu'],
            'localidad' => ['required', 'string', 'min:3', 'max:150'],
            'mail' => ['required', 'string', 'min:5', 'max:60'],
            'perfil_id'=>['required']
        ]);
        //2.- Procesar
        try {
            $usuario->update($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('usuarios.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('usuarios.index')->with("mensaje", "¡¡¡Usuario editado correctamente!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuario)
    {
        try {
            $usuario->delete();
        } catch (\Exception $ex) {
            return redirect()->route('usarios.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('usuarios.index')->with("mensaje", "¡¡¡Usuario borrado correctamente!!!");
    }
}
