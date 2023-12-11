<?php

namespace App\Http\Controllers\Contratante;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\Requisicion;
use Illuminate\Http\Request;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $requisicion_id)
    {
        $requisicion = Requisicion::with('detalles')->where('id_requisicion', $requisicion_id)->firstOrFail();
        $empleado = Empleado::where('cargo_id', '3')
            ->where('dependencia_id', '1')
            ->first();
        $AdminContratos = Empleado::all();
        $empleadomateriales= Empleado::where('cargo_id', '7')
        ->where('dependencia_id', '1')
        ->first();
        $empleadofinanzas = Empleado::where('cargo_id', '5')
            ->where('dependencia_id', '1')
            ->first();
        return view('/Contratante/Contratos.create', compact('requisicion', 'empleado', 'AdminContratos','empleadomateriales','empleadofinanzas'));
    }
    public function obtenerCargo($numEmpleado) {
        $adminContrato = Empleado::where('num_empleado', $numEmpleado)->first();
    
        if ($adminContrato) {
            $cargo = $adminContrato->Cargos->nombre_cargo;
            return $cargo;
        } else {
            return "Cargo no encontrado";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
