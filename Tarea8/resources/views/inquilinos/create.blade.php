@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Agregar Inquilino') }}</h1>
 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('inquilinos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="correo_electronico">{{ __('Correo Electrónico') }}</label>
                        <input type="email" name="correo_electronico" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
