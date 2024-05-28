@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del Inquilino') }}</h1>
 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nombre') }}</h5>
                <p class="card-text">{{ $inquilino->nombre }}</p>
 
                <h5 class="card-title">{{ __('Correo Electrónico') }}</h5>
                <p class="card-text">{{ $inquilino->correo_electronico }}</p>
 
            </div>
        </div>
    </div>
@endsection
