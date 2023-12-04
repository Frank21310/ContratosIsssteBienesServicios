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
        $requisiciones = Requisicion::where('estatus', '1')->orderBy('id_requisicion', 'DESC');
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
        $requisicion->total = $request->total;
        $requisicion->aticipos = $request->aticipos;
        $requisicion->observaciones = $request->observaciones;
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
        return view('Contratante.SeguimientoRequisicion.edit', compact('requisicion', 'partidas', 'cucops', 'unidades','Garantias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        $detalle = DetalleRequisicion::where('id', $id)->firstOrFail();
        $requisicion = $this->Updaterequisicion($request, $requisicion);
        $detalle = $this->Updatedetalle($request, $detalle);

        return redirect()
            ->route('SeguimientoRequisicion.index');
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
}

