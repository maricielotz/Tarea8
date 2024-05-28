<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquilino;

class InquilinoController extends Controller
{
    public function index()
    {
        $inquilinos = Inquilino::all();
        return view('inquilinos.index', compact('inquilinos'));
    }

    public function create()
    {
        return view('inquilinos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|string|email|max:255|unique:inquilinos',
        ]);

        Inquilino::create($request->all());

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino creado con éxito.');
    }

    public function edit($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        return view('inquilinos.edit', compact('inquilino'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|string|email|max:255|unique:inquilinos,correo_electronico,' . $id,
        ]);

        $inquilino = Inquilino::findOrFail($id);
        $inquilino->update($request->all());

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino actualizado con éxito.');
    }

    public function show($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        return view('inquilinos.show', compact('inquilino'));
    }

    public function destroy($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        $inquilino->delete();

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino eliminado con éxito.');
    }
}
