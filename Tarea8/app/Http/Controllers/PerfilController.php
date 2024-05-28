<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfiles = Perfil::all();
        return view('perfiles.index', compact('perfiles'));
    }

    public function create()
    {
        return view('perfiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:8|perfiles',
            'bio' => 'required|string|max:50',
            'usuario_id' => 'required|string|max:8|perfiles',
            
        ], [
            'id.unique' => 'El id ingresado ya está en uso.',
            'usuario_id' => 'El Usuario_id ingresado ya está en uso.',
        ]);

        Perfil::create($request->all());

        return redirect()->route('perfiles.index')->with('success', 'Perfil creado exitosamente.');
    }

    public function show(Perfil $perfil)
    {
        return view('perfiles.show', compact('perfil'));
    }

    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit', compact('perfil'));
    }

    public function update(Request $request, Perfil $perfil)
    {
        $request->validate([
            'id' => 'required|string|max:8|perfiles'.$perfil->id . ',id',
            'bio' => 'required|string|max:50',
            'usuario_id' => 'required|string|max:8|perfiles',
        ], [
            'id.unique' => 'El id ingresado ya está en uso.',
            'usuario_id' => 'El Usuario_id ingresado ya está en uso.',
        ]);

        $perfil->update($request->all());

        return redirect()->route('perfiles.index')->with('success', 'perfil actualizado correctamente.');
    }

    public function destroy(Perfil $perfil)
    {
        $perfil->delete();

        return redirect()->route('perfiles.index')->with('success', 'perfil eliminado exitosamente.');
    }
}
