<?php

namespace App\Http\Controllers\Contratante;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\PersonaFisica;
use App\Models\PersonaMoral;
use App\Models\Requisicion;
use App\Models\TipoC;
use App\Models\TipoCaracter;
use App\Models\TipoContrato;
use App\Models\TipoPersona;
use Illuminate\Http\Request;

class ContratosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solocontratante', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contratos = Contrato::select('*')->orderBy('id_contrato', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 4;

        if (isset($request->search)) {
            $contratos = $contratos->where('id_contrato', 'like', '%' . $request->search . '%')
                ->orWhere('vigencia_contrato', 'like', '%' . $request->search . '%');
        }
        $contratos = $contratos->paginate($limit)->appends($request->all());
        return view('Contratante.Contratos.index', compact('contratos'));
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
        $empleadomateriales = Empleado::where('cargo_id', '7')
            ->where('dependencia_id', '1')
            ->first();
        $empleadofinanzas = Empleado::where('cargo_id', '5')
            ->where('dependencia_id', '1')
            ->first();
        $tiposcontratos = TipoC::all();
        $tipopersona = TipoPersona::all();
        $tipocaracters = TipoCaracter::all();

        return view(
            '/Contratante/Contratos.create',
            compact(
                'requisicion',
                'empleado',
                'AdminContratos',
                'empleadomateriales',
                'empleadofinanzas',
                'tiposcontratos',
                'tipopersona',
                'tipocaracters'
            )
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contrato = Contrato::create([
            
            'requisicion_id' => $request->requisicion_id,
            'tipo_contrato_id' => $request->tipo_contrato_id,
            'descripcion_contrato' => $request->descripcion_contrato,
            'vigencia_contrato' => $request->vigencia_contrato,
            'empleado_num' => $request->empleado_num,
            'oficio_suficiencia' => $request->oficio_suficiencia,
            'fecha_oficio_suficiencia' => $request->fecha_oficio_suficiencia,
            'oficio_plurianualidad' => $request->oficio_plurianualidad,
            'reduccion' => $request->reduccion,
            'autorizacion_previa' => $request->autorizacion_previa,

            
        ]);

        if ($request->tipo_persona_id == 1) {
            PersonaFisica::create([
                'contrato_id' => $contrato->id_contrato,
                'tipo_persona_id' => $request->tipo_persona_id,
                'rfc' => $request->rfc,
                'nombre_proveedor' => $request->nombre_proveedor,
                'nacionalidad' => $request->nacionalidad,
                'domicilio' => $request->domicilio,
                'documento_expedicion' => $request->documento_expedicion,
                'instutucion_expedida' => $request->instutucion_expedida,
            ]);
        } elseif ($request->tipo_persona_id == 2) {
            PersonaMoral::create([
                'contrato_id' => $contrato->id_contrato, // Guarda el ID del contrato
                'tipo_persona_id' => $request->tipo_persona_id,
                'rfc' => $request->rfc,
                'nombre_proveedor' => $request->nombre_proveedor,
                'nacionalidad' => $request->nacionalidad,
                'domicilio' => $request->domicilio,
                'instrumento_publico' => $request->instrumento_publico,
                'registro_publico' => $request->registro_publico,
                'fiolio_registro' => $request->fiolio_registro,
                'fecha_registro' => $request->fecha_registro,
                'repesentante_nombre' => $request->repesentante_nombre,
                'tipo_caracter_id' => $request->tipo_caracter_id,
                'instrumento_notarial' => $request->instrumento_notarial,
                'instrumento_publico_representante' => $request->instrumento_notarial,
            ]);
        }
        return redirect()
            ->route('Contratos.index');
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
