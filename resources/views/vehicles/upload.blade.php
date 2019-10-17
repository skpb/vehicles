@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importar vehículos</div>

                <div class="card-body">
                    <form action="{{ route('vehicles.import') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="excel" name="excel" required>
                                <label class="custom-file-label" for="excel" data-browse="Examinar">Seleccione archivo</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-dark">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
