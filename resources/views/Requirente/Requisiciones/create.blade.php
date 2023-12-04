@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Nueva requisición</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a href="{{ route('Requisiciones.index') }}" class="btn btn-primary ml-auto BotonRojo ">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('Requisiciones.store') }}" method="POST" enctype="multipart/form-data" id="create">

                @include('Requirente.Requisiciones.formularios.form')
                
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary ml-auto BotonGris" form="create">
                    <i class="fas fa-plus"></i>
                    Crear
                </button>
            </div>
        </div>
    </div>

    <!-- Script para mostrar la ventana emergente al guardar datos -->
    <script>
        document.getElementById('btn-guardar-datos').addEventListener('click', function() {
            $('#modalSubirArchivos').modal('show');
        });
    </script>
@endsection
