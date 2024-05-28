@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del Usuario') }}</h1>
 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nombre') }}</h5>
                <p class="card-text">{{ $usuario->nombre }}</p>
 
                <h5 class="card-title">{{ __('Correo Electrónico') }}</h5>
                <p class="card-text">{{ $usuario->email }}</p>
 
                <h5 class="card-title">{{ __('País') }}</h5>
                <p class="card-text">{{ $usuario->pais->nombre }}</p>
 
                <!-- Otros detalles del usuario -->
            </div>
        </div>
    </div>
@endsection
 