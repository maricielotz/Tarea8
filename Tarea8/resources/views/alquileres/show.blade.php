@extends('layouts.admin')



@section('main-content')

  <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">{{ __('Detalle del Alquiler') }}</h1>



    <div class="card shadow mb-4">

      <div class="card-body">

        <div class="form-group">

          <label for="monto">{{ __('Monto') }}</label>

          <input type="text" name="monto" class="form-control" value="{{ $alquiler->monto }}" readonly>

        </div>

        <div class="form-group">

          <label for="fecha_inicio">{{ __('Fecha de Inicio') }}</label>

          <input type="date" name="fecha_inicio" class="form-control" value="{{ $alquiler->fecha_inicio }}" readonly>

        </div>

        <div class="form-group">

          <label for="fecha_fin">{{ __('Fecha de Fin') }}</label>

          <input type="date" name="fecha_fin" class="form-control" value="{{ $alquiler->fecha_fin }}" readonly>

        </div>

        <div class="form-group">

          <label for="inquilinos">{{ __('Inquilinos') }}</label>

          <ul>

            @foreach($alquiler->inquilinos as $inquilino)

              <li>{{ $inquilino->nombre }}</li>

            @endforeach

          </ul>

        </div>

        <div class="form-group">

          <label for="departamento_id">{{ __('Departamento') }}</label>

          <input type="text" class="form-control" value="{{ $alquiler->departamento->direccion ?? 'N/A' }}" readonly>

        </div>

        <a href="{{ route('alquileres.index') }}" class="btn btn-primary">{{ __('Volver') }}</a>

      </div>

    </div>

  </div>

@endsection

