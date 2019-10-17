@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Panel administrativo - {{ config('app.name', 'Vehicles') }}.</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Has iniciado sesión!

                    <ul>
                        <li><a href="{{ route('vehicles.index') }}">Ver listado</a></li>
                        <li><a href="#">Ingresar nuevo</a></li>
                        <li><a href="{{ route('vehicles.upload') }}">Subir masivamente desde archivo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
