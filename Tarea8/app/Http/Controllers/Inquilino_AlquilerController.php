<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inquilino;
use App\Models\Alquiler;

class InquilinoAlquilerController extends Controller
{
public function store(Request $request)
{
    $request->validate([
      'inquilino_id' => 'required|exists:inquilinos,id',
      'alquiler_id' => 'required|exists:alquileres,id',
    ]);
    $inquilino = Inquilino::findOrFail($request->inquilino_id);
    $alquiler = Alquiler::findOrFail($request->alquiler_id);
    if (!$alquiler->inquilinos->contains($inquilino)) {
      $alquiler->inquilinos()->attach($inquilino);
    }
    return redirect()->route('alquileres.show', $alquiler->id)->with('success', 'Inquilino asociado al alquiler correctamente');
  }
  public function destroy(Request $request)
  {
    $request->validate([
      'inquilino_id' => 'required|exists:inquilinos,id',
      'alquiler_id' => 'required|exists:alquileres,id',
    ]);
    $inquilino = Inquilino::findOrFail($request->inquilino_id);
    $alquiler = Alquiler::findOrFail($request->alquiler_id);
    if ($alquiler->inquilinos->contains($inquilino)) {
      $alquiler->inquilinos()->detach($inquilino);
    }
    return redirect()->route('alquileres.show', $alquiler->id)->with('success', 'Inquilino desasociado del alquiler correctamente');
  }
}