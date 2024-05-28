<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Alquiler;
use App\Models\Departamento;
use App\Models\Inquilino;


class AlquilerController extends Controller
{
    public function index()
    {
        $alquileres = Alquiler::all();
        return view('alquileres.index', compact('alquileres'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        $inquilinos = Inquilino::all();
        return view('alquileres.create', compact('departamentos', 'inquilinos'));
    }

    public function store(Request $request)

    {
  
      $request->validate([
  
        'monto' => 'required|numeric',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'nullable|date',
        'departamento_id' => 'required|exists:departamentos,id',
        'inquilinos' => 'required|array',
        'inquilinos.*' => 'exists:inquilinos,id',
  
      ]);
  
  
  
      $fechaInicio = Carbon::parse($request->fecha_inicio)->format('Y-m-d H:i:s');
      $fechaFin = $request->fecha_fin ? Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s') : null;
      $alquiler = Alquiler::create([
  
        'monto' => $request->monto,
        'fecha_inicio' => $fechaInicio,
        'fecha_fin' => $fechaFin,
        'departamento_id' => $request->departamento_id,
  
      ]);
  
  
  
      $alquiler->inquilinos()->attach($request->inquilinos);
      return redirect()->route('alquileres.show', $alquiler->id)->with('success', 'Alquiler creado correctamente');
  
    }

    public function show($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        return view('alquileres.show', compact('alquiler'));
    }

    public function edit($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        $departamentos = Departamento::all();
        $inquilinos = Inquilino::all();
        return view('alquileres.edit', compact('alquiler', 'departamentos', 'inquilinos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'departamento_id' => 'required|exists:departamentos,id',
            'inquilinos' => 'required|array|min:1',
            'inquilinos.*' => 'exists:inquilinos,id',
        ]);

        $alquiler = Alquiler::findOrFail($id);
        $alquiler->update($request->all());
        $alquiler->inquilinos()->sync($request->input('inquilinos'));

        return redirect()->route('alquileres.index')->with('success', '¡El alquiler se ha actualizado correctamente!');
    }

    public function destroy($id)
    {
        Alquiler::findOrFail($id)->delete();
        return redirect()->route('alquileres.index')->with('success', '¡El alquiler se ha eliminado correctamente!');
    }
}
