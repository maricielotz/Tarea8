@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del País') }}</h1>
 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('ID') }}</h5>
                <p class="card-text">{{ $pais->id }}</p>
 
                <h5 class="card-title">{{ __('Nombre') }}</h5>
                <p class="card-text">{{ $pais->nombre }}</p>
 
                <a href="{{ route('paises.edit', $pais->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                <form action="{{ route('paises.destroy', $pais->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
 