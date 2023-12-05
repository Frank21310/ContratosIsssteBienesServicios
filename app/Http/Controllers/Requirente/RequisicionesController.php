<?php

namespace App\Http\Controllers\Requirente;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Condicion;
use App\Models\Dependencia;
use App\Models\DetalleRequisicion;
use App\Models\Garantia;
use App\Models\Insumo;
use App\Models\Medida;
use App\Models\Metodo;
use App\Models\Pais;
use App\Models\Partida;
use App\Models\Requisicion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Barryvdh\DomPDF\Facade\Pdf;


class RequisicionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solorequirente', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
        return view('/Requirente/Requisiciones.index', compact('requisiciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    public function create(Request $request)
    {
        
        $dependenciaempleados = Dependencia::all();
        $areas  = Area::all();
        $condiciones  = Condicion::all();
        $garantias  = Garantia::all();
        $paises  = Pais::all();
        $partidas = Partida::all();
        $unidades = Medida::all();
        $metodos = Metodo::all();

        return view('/Requirente/Requisiciones.create', compact(
            'dependenciaempleados',
            'areas',
            'garantias',
            'condiciones',
            'paises',
            'partidas',
            'unidades',
            'metodos',

        ));
    }

    public function fclaveCucop(Request $request)
    {
        $partidaId = $request->input('nPartida');
        $data = Insumo::where('partida_id', $partidaId)->get();

        return response()->json($data);
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'area_id' => 'required',
            'fecha_elaboracion' => 'required',
            'no_requisicion' => 'required',
            'lugar_entrega' => 'required',
            'otros_gravamientos' => 'required',
            'total' => 'required',
            'existencia_almacen' => 'required',
            'observaciones' => 'required',
            'registro_sanitario' => 'required',
            'capacitacion' => 'required',
            'pais_id' => 'required',
            'metodo_id' => 'required',
            'detalles.*.num_partida' => 'required',
            'detalles.*.cucop' => 'required',
            'detalles.*.descripcion' => 'required',
            'detalles.*.cantidad' => 'required|numeric|min:1',
            'detalles.*.medida_id' => 'required',
            'detalles.*.precio' => 'required|numeric|min:0',
            'detalles.*.importe' => 'required|numeric|min:0',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $requisicion = Requisicion::create([

            'dependencia_id' => $request->dependencia_id,
            'area_id' => $request->area_id,
            'fecha_elaboracion' => $request->fecha_elaboracion,
            'no_requisicion' => $request->no_requisicion,
            'fecha_requerida' => $request->fecha_requerida,
            'lugar_entrega' => $request->lugar_entrega,
            'otros_gravamientos' => $request->otros_gravamientos,
            'total' => $request->total,
            'anexos' => $request->anexos,
            'aticipos' => $request->aticipos,
            'autorizacion_presupuesto' => $request->autorizacion_presupuesto,
            'existencia_almacen' => $request->existencia_almacen,
            'observaciones' => $request->observaciones,
            'registro_sanitario' => $request->registro_sanitario,
            'normas' => $request->normas,
            'capacitacion' => $request->capacitacion,
            'pais_id' => $request->pais_id,
            'metodo_id' => $request->metodo_id,
            'garantia1_id' => $request->garantia1_id,
            'porcentaje_1' => $request->porcentaje_1,
            'garantia_2_id' => $request->garantia_2_id,
            'porcentaje_2' => $request->porcentaje_2,
            'garantia_3_id' => $request->garantia_3_id,
            'porcentaje_3' => $request->porcentaje_3,
            'pluralidad' => $request->pluralidad,
            'penas_convencionales' => $request->penas_convencionales,
            'tiempo_fabricacion' => $request->tiempo_fabricacion,
            'condicion_id' => $request->condicion_id,
            'solicita' => $request->solicita,
            'autoriza' => $request->autoriza,
            'estatus' => $request->estatus,

        ]);

        if ($requisicion && $request->filled('detalles') && is_array($request->detalles)) {
            $requisicion_id = $requisicion->id_requisicion;

            $detalles = [];
            foreach ($request->detalles as $detalle) {
                $detalles[] = new DetalleRequisicion([
                    'requisicion_id' => $requisicion_id,
                    'num_partida' => $detalle['num_partida'],
                    'cucop' => $detalle['cucop'],
                    'descripcion' => $detalle['descripcion'],
                    'cantidad' => $detalle['cantidad'],
                    'medida_id' => $detalle['medida_id'],
                    'precio' => $detalle['precio'],
                    'importe' => $detalle['importe'],
                ]);
            }

            $requisicion->detalles()->saveMany($detalles);
        } else {
            return redirect()->back()->with('error', 'Hubo un error al crear la requisición. Por favor, inténtalo de nuevo.');
        }


        $requisitionFolder = 'requisicion/' . $requisicion->id_requisicion;
        Storage::disk('s3')->makeDirectory($requisitionFolder);

        // Subir los archivos a la carpeta en S3
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $fileName = $archivo->getClientOriginalName();
                $path = $archivo->storeAs($requisitionFolder, $fileName, 's3');
            }
        }
        return redirect()
            ->route('Requisiciones.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $requisicion = Requisicion::with('detalles')->where('id_requisicion', $id)->firstOrFail();
        return view('/Requirente/Requisiciones.show', compact('requisicion'));
    }
    
    public function imprimirRequisicion($id)
    {
        $image = '/assets/img/LogoConvinado.jpg';
        $requisicion = Requisicion::with('detalles')->where('id_requisicion', $id)->firstOrFail();
        
        $pdf = Pdf::loadView('Requirente.Requisiciones.imprimir', compact('requisicion', 'image'));
        return $pdf->setPaper('a4','landscape')->stream('requisicion_' . $id . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        return view('/Requirente/Requisiciones.edit', compact('requisicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        $requisicion_id = $requisicion->id_requisicion;
        $requisicion = $this->createUpdateRol($request, $requisicion);
        return redirect()
            ->route('Requisiciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requisicion = Requisicion::findOrFail($id);
        try {
            $requisicion->delete();
            return redirect()
                ->route('Requisiciones.index');
        } catch (QueryException $e) {
            return redirect()
                ->route('Requisiciones.index');
        }
    }
}

