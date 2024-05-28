<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Pais;
 
class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::with('pagos')->get();
        return view('paises.index', compact('paises'));
    }
 
    public function create()
    {
        return view('paises.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:paises,nombre',
        ]);
 
        $pais = Pais::create($request->only('nombre'));
 
        return redirect()->route('paises.index')->with('success', 'País creado exitosamente');
    }
 
    public function show($id)
    {
        $pais = Pais::findOrFail($id);
        return view('paises.show', compact('pais'));
    }
 
    public function edit($id)
    {
        $pais = Pais::findOrFail($id);
        return view('paises.edit', compact('pais'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:paises,nombre,' . $id,
        ]);
 
        $pais = Pais::findOrFail($id);
        $pais->update($request->only('nombre'));
 
        return redirect()->route('paises.index')->with('success', 'País actualizado exitosamente');
    }
 
    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);
        $pais->delete();
        return redirect()->route('paises.index')->with('success', 'País eliminado exitosamente');
    }
}
 