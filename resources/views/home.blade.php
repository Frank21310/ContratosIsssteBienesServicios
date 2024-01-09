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
            Actualmente estas asgindo como {{ Auth::user()->Roles->nombre_rol }}
        </p>
        <p>
            Dependencia: {{ Auth::user()->Empleados->Dependencias->nombre_dependencia }}
        </p>
      </div>
    </div>
  </section>

@endsection
