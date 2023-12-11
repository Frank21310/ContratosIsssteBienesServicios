<?php

namespace App\Http\Controllers\Contratante;

use App\Http\Controllers\Controller;
use App\Models\DetalleRequisicion;
use App\Models\Garantia;
use App\Models\Insumo;
use App\Models\Medida;
use App\Models\Partida;
use App\Models\Requisicion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RequisicionesSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $requisiciones = Requisicion::whereIn('estatus', ['1', '2'])->orderBy('id_requisicion', 'DESC');
        $limit = (isset($request->limit)) ? $request->limit : 5;
        if (isset($request->search)) {
            $requisiciones = $requisiciones->where('id_requisicion', 'like', '%' . $request->search . '%')
                ->orWhere('no_requesicion', 'like', '%' . $request->search . '%');
        }
        $requisiciones = $requisiciones->paginate($limit)->appends($request->all());
        return view('Contratante.SeguimientoRequisicion.index', compact('requisiciones'));
    }
    public function Updaterequisicion(Request $request, $requisicion)
    {
        if ($request->has('requisicion_id')) {
            $requisicion->requisicion_id = $request->requisicion_id;
        }
        $requisicion->no_requisicion = $request->no_requisicion;
        $requisicion->lugar_entrega = $request->lugar_entrega;
        $requisicion->otros_gravamientos = $request->otros_gravamientos;
        $requisicion->garantia1_id = $request->garantia1_id;
        $requisicion->porcentaje_1 = $request->porcentaje_1;
        $requisicion->garantia_2_id = $request->garantia_2_id;
        $requisicion->porcentaje_2 = $request->porcentaje_2;
        $requisicion->garantia_3_id = $request->garantia_3_id;
        $requisicion->porcentaje_3 = $request->porcentaje_3;
        $requisicion->autoriza = $request->autoriza;
        $requisicion->estatus = $request->estatus;
        $requisicion->save();
        return  $requisicion;
    }

    public function Updatedetalle(Request $request, $detalle)
    {
        if ($request->has('requisicion_id')) {
            $detalle->requisicion_id = $request->requisicion_id;
        }

        $detalle->num_partida = $request->num_partida;
        $detalle->cucop = $request->cucop;
        $detalle->descripcion = $request->descripcion;
        $detalle->cantidad = $request->cantidad;
        $detalle->medida_id = $request->medida_id;
        $detalle->precio = $request->precio;
        $detalle->importe = $request->importe;

        $detalle->save();
        return  $detalle;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unidades = Medida::all();
        $Garantias = Garantia::all();
        $partidas = Partida::all();
        $cucops = Insumo::all();
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        $detalles = DetalleRequisicion::where('requisicion_id', $requisicion->id)->get();

        return view('Contratante.SeguimientoRequisicion.edit', compact('requisicion', 'partidas', 'cucops', 'unidades', 'Garantias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        $detalles = DetalleRequisicion::where('requisicion_id', $requisicion->id)->get();
        foreach ($detalles as $detalle) {
            $this->Updatedetalle($request, $detalle);
        }
        $this->Updaterequisicion($request, $requisicion);
        return redirect()->route('SeguimientoRequisicion.index');
    }

    public function destroy(string $id)
    {
        $detalle = DetalleRequisicion::findOrFail($id);
        try {
            $detalle->delete();
            return redirect()->route('SeguimientoRequisicion.edit', ['id' => $detalle->requisicion_id]);
        } catch (QueryException $e) {
            return redirect()->route('SeguimientoRequisicion.edit', ['id' => $detalle->requisicion_id]);
        }
    }
    public function updateTipoContratacion(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        switch ($request->tipo_id) {
            case 1:
                // Actualiza el tipo de contratación
                $requisicion->tipo_id = '1';
                $requisicion->save();
                
                // Redirige a la ruta de creación de contrato con el mismo ID de requisición
                return redirect()->route('Contratos.create', ['requisicion_id' => $requisicion->id_requisicion]);
                break;
            case 2:
                $requisicion->tipo_id = '2';
                $requisicion->save();
                return redirect()->route('SeguimientoRequisicion.index');

                break;
            case 3:
                // Código similar para el tipo_id 3
                break;
            default:
                // Redirige al index si el tipo_id no coincide con ninguno de los casos
                return redirect()->route('SeguimientoRequisicion.index');
        }
    }


    public function updateTipo(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();

        // Actualiza solo el tipo_id sin afectar otros campos
        $requisicion->tipo_id = $request->tipo_id;
        $requisicion->save();

        // Devuelve una respuesta si es necesario
        return response()->json(['message' => 'Tipo actualizado correctamente']);
    }
}
