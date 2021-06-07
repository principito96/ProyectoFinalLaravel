<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil = Perfil::orderBy('nombre')->paginate(3);
        return view('perfil.index', compact('perfil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfil.create');
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
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:perfils,nombre'],
            'descripcion' => ['required', 'string', 'min:3', 'max:150']
        ]);
        //2.- Procesar
        try {
            Perfil::create($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('perfil.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('perfil.index')->with("mensaje", "¡¡¡Perfil creado correctamente!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfil.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        return view('perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //1.- Validamos
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:perfils,nombre'],
            'descripcion' => ['required', 'string', 'min:3', 'max:150']
        ]);
        //2.- Procesar
        try {
            $perfil->update($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('perfil.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('perfil.index')->with("mensaje", "¡¡¡Perfil actualizado correctamente!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        try {
            $perfil->delete();
        } catch (\Exception $ex) {
            return redirect()->route('perfil.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('perfil.index')->with("mensaje", "¡¡¡Perfil borrado correctamente!!!");
    }
}
