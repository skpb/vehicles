@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="pb-1">Listado de vehículos</h1>
        <p>
            <a href="{{ route('home') }}" class="btn btn-outline-dark">Regresar al panel administrativo</a>
        </p>
    </div>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
            </button>
            <strong>¡Muy bien!</strong> {{ session('status') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Combustible</th>
                    <th scope="col"># Puertas</th>
                    <th scope="col">Año</th>
                    <th scope="col">Activo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicles->firstItem() + $loop->index }}</td>
                        <td>{{ $vehicle->registration_number }}</td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>{{ $vehicle->fuel_type }}</td>
                        <td>{{ $vehicle->doors }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>{{ $vehicle->is_active }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $vehicles->links() }}
    Mostrando resultados del {{ $vehicles->firstItem() }} al {{ $vehicles->lastItem() }} de un total de {{ $vehicles->total() }}
</div>
@endsection
