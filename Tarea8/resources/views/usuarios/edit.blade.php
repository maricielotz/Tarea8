@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Usuario') }}</h1>
 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">{{ __('Nombre') }}</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
            </div>
            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>
            <div class="form-group">
                <label for="pais">{{ __('País') }}</label>
                <select class="form-control" id="pais" name="pais_id" required>
                    @foreach($paises as $pais)
                        <option value="{{ $pais->id }}" {{ $usuario->pais_id == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="bio">{{ __('Biografía') }}</label>
                <textarea class="form-control" id="bio" name="bio">{{ old('bio', $usuario->perfil->bio) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>
        </form>
    </div>
@endsection
 
