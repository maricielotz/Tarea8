<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Pais;
 
class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('perfil')->get();
        return view('usuarios.index', compact('usuarios'));
    }
 
    public function create()
    {
        $paises = Pais::all(); // Obtén todos los registros de la tabla Pais
 
        return view('usuarios.create', compact('paises'));
    }
 
    //public function store(Request $request)
    //{
    //    $usuario = Usuario::create($request->all());
    //    $usuario->perfil()->create($request->only('bio'));
    //    return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    //}
 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'pais_id' => 'required|exists:paises,id',
        ]);
 
        $usuario = Usuario::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'pais_id' => $request->input('pais_id'),
        ]);
 
        // Si el campo 'bio' es opcional, puedes verificar su existencia antes de crearlo
        if ($request->has('bio')) {
            $usuario->perfil()->create(['bio' => $request->input('bio')]);
        }
 
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }
 
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }
 
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $paises = Pais::all();
        return view('usuarios.edit', compact('usuario', 'paises'));
    }
 
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        $usuario->perfil()->update($request->only('bio'));
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
 
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->perfil()->delete();
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}