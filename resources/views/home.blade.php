@extends('layouts.app')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Bienvenido al sistema web de contratos</h1>
        <p class="lead text-body-secondary">
            ¡Hola, <strong>{{ Auth::user()->Empleados->nombre }} {{ Auth::user()->Empleados->apellido_paterno }} {{ Auth::user()->Empleados->apellido_materno }}</strong>!
        </p>
        <p>
            Actualmente estas asignado  como {{ Auth::user()->Roles->nombre_rol }}
        </p>
        <p>
            Dependencia: {{ Auth::user()->Empleados->Dependencias->nombre_dependencia }}
        </p>
        
      </div>
    </div>
    @if (Auth::user()->rol_id == 1)
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body cuadrorojo">
                            <h5 class="card-title">Total de Usuarios</h5>
                            <p class="card-text">{{ $totalUsuarios }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body cuadrorojo">
                            <h5 class="card-title">Total de Empleados</h5>
                            <p class="card-text">{{ $totalEmpleados }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                      <div class="card-body cuadrorojo">
                          <h5 class="card-title">Total de Proveedores</h5>
                          <p class="card-text">{{ $totalProveedores }}</p>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    @endif
  </section>

@endsection
