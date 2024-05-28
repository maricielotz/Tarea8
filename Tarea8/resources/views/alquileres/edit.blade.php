@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Alquiler') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('alquileres.update', $alquiler->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="monto">{{ __('Monto') }}</label>
                        <input type="text" name="monto" class="form-control" value="{{ $alquiler->monto }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">{{ __('Fecha de Inicio') }}</label>
                        <input type="date" name="fecha_inicio" class="form-control" value="{{ $alquiler->fecha_inicio }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">{{ __('Fecha de Fin') }}</label>
                        <input type="date" name="fecha_fin" class="form-control" value="{{ $alquiler->fecha_fin }}">
                    </div>
                    <div class="form-group">
                        <label for="departamento_id">{{ __('Departamento') }}</label>
                        <select name="departamento_id" class="form-control" required>
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}" {{ $alquiler->departamento_id == $departamento->id ? 'selected' : '' }}>{{ $departamento->direccion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inquilinos">{{ __('Inquilinos') }}</label>
                        <select name="inquilinos[]" class="form-control" required>
                            @foreach($inquilinos as $inquilino)
                                <option value="{{ $inquilino->id }}" {{ in_array($inquilino->id, $alquiler->inquilinos->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $inquilino->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
