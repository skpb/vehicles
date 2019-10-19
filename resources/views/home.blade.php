@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Panel administrativo - Usuario.</div>

                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('password.change') }}">Cambiar contraseña</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
