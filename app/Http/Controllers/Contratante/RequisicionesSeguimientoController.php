<?php

namespace App\Http\Controllers\Contratante;

use App\Http\Controllers\Controller;
use App\Models\DetalleRequisicion;
use App\Models\Garantia;
use App\Models\Insumo;
use App\Models\Medida;
use App\Models\Partida;
use App\Models\Requisicion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

use function Laravel\Prompts\alert;

class RequisicionesSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $requisiciones = Requisicion::whereIn('estatus', ['1', '2', '3', '4'])->orderBy('estatus', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 4;
        if (isset($request->search)) {
            $requisiciones = $requisiciones->where('id_requisicion', 'like', '%' . $request->search . '%')
                ->orWhere('no_requisicion', 'like', '%' . $request->search . '%');
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
        $requisicion->anexos = $request->anexos;
        $requisicion->autorizacion_presupuesto = $request->autorizacion_presupuesto;
        $requisicion->existencia_almacen = $request->existencia_almacen;
        $requisicion->observaciones = $request->observaciones;
        $requisicion->registro_sanitario = $request->registro_sanitario;
        $requisicion->capacitacion = $request->capacitacion;
        $requisicion->garantia1_id = $request->garantia1_id;
        $requisicion->porcentaje_1 = $request->porcentaje_1;
        $requisicion->garantia_2_id = $request->garantia_2_id;
        $requisicion->porcentaje_2 = $request->porcentaje_2;
        $requisicion->garantia_3_id = $request->garantia_3_id;
        $requisicion->porcentaje_3 = $request->porcentaje_3;
        $requisicion->pluralidad = $request->pluralidad;
        $requisicion->penas_convencionales = $request->penas_convencionales;
        $requisicion->autoriza = $request->autoriza;
        $requisicion->estatus = $request->estatus;
        $requisicion->save();
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
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $unidades = Medida::all();
        $Garantias = Garantia::all();
        $partidas = Partida::all();
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        $detalles = DetalleRequisicion::where('requisicion_id', $requisicion->id_requisicion)->get();
        // Obtener la partida de la requisición
        $partidaRequisicion = $requisicion->partida_id;

        // Filtrar los insumos por la partida de la requisición
        $cucops = Insumo::whereHas('PartidaInsumo', function ($query) use ($partidaRequisicion) {
            $query->where('id_partida', $partidaRequisicion);
        })->get();

        return view('Contratante.SeguimientoRequisicion.edit', compact('requisicion', 'partidas', 'cucops', 'unidades', 'Garantias', 'detalles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        $oldNoRequisicion = $requisicion->no_requisicion;
        $requisicion->no_requisicion = $request->no_requisicion;
        $requisicion->lugar_entrega = $request->lugar_entrega;
        $requisicion->otros_gravamientos = $request->otros_gravamientos;
        $requisicion->anexos = $request->anexos;
        $requisicion->autorizacion_presupuesto = $request->autorizacion_presupuesto;
        $requisicion->existencia_almacen = $request->existencia_almacen;
        $requisicion->observaciones = $request->observaciones;
        $requisicion->registro_sanitario = $request->registro_sanitario;
        $requisicion->capacitacion = $request->capacitacion;
        $requisicion->garantia1_id = $request->garantia1_id;
        $requisicion->porcentaje_1 = $request->porcentaje_1;
        $requisicion->garantia_2_id = $request->garantia_2_id;
        $requisicion->porcentaje_2 = $request->porcentaje_2;
        $requisicion->garantia_3_id = $request->garantia_3_id;
        $requisicion->porcentaje_3 = $request->porcentaje_3;
        $requisicion->pluralidad = $request->pluralidad;
        $requisicion->penas_convencionales = $request->penas_convencionales;
        $requisicion->autoriza = $request->autoriza;
        $requisicion->estatus = $request->estatus;
        $requisicion->save();

        foreach ($request->input('detalles') as $index => $detalleData) {
            $numPartida = $detalleData['num_partida']; // Suponiendo que 'num_partida' sea una clave única para identificar detalles
        
            $detalle = DetalleRequisicion::where('num_partida', $numPartida)
                ->where('requisicion_id', $requisicion->id_requisicion)
                ->first();
        
            if (!$detalle) {
                $detalle = new DetalleRequisicion();
                $detalle->requisicion_id = $requisicion->id_requisicion; // Asigna el ID de la requisición al nuevo detalle
            }
        
            $detalle->num_partida = $numPartida;
            $detalle->cucop = $detalleData['cucop'];
            $detalle->descripcion = $detalleData['descripcion'];
            $detalle->cantidad = $detalleData['cantidad'];
            $detalle->medida_id = $detalleData['medida_id'];
            $detalle->precio = $detalleData['precio'];
            $detalle->importe = $detalleData['importe'];
        
            $detalle->save();
        }
        if ($oldNoRequisicion !== $requisicion->no_requisicion) {
            $oldFolderPath = 'requisicion/' . $oldNoRequisicion;
            $newFolderPath = 'requisicion/' . $requisicion->no_requisicion;
    
            // Renombrar la carpeta utilizando el sistema de archivos de Laravel
            Storage::disk('local')->move($oldFolderPath, $newFolderPath);
        }
    
        // Subir los archivos a la carpeta local con el nuevo nombre
        $requisitionFolder = 'requisicion/' . $requisicion->no_requisicion;
        Storage::disk('local')->makeDirectory($requisitionFolder);
    
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $fileName = $archivo->getClientOriginalName();
                $path = $archivo->storeAs($requisitionFolder, $fileName, 'local');
            }
        }

        return redirect()->route('SeguimientoRequisicion.edit', ['id' => $id]);
    }

    public function updateTipoContratacion(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        switch ($request->tipo_id) {
            case 1:
                // Actualiza el tipo de contratación
                $requisicion->tipo_id = '1';
                $requisicion->estatus = '4';
                $requisicion->save();

                // Redirige a la ruta de creación de contrato con el mismo ID de requisición
                return redirect()->route('Contratos.create', ['requisicion_id' => $requisicion->id_requisicion]);
                break;
            case 2:
                $requisicion->tipo_id = '2';
                $requisicion->estatus = '3';
                $requisicion->save();
                return redirect()->route('SeguimientoRequisicion.index');

                break;
            case 3:
                $requisicion->tipo_id = '3';
                $requisicion->estatus = '2';
                $requisicion->save();
                return redirect()->route('SeguimientoRequisicion.index');
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

    public function descargarArchivosRequisicion($id)
    {
        // Obtener la requisición por ID
    $requisicion = Requisicion::findOrFail($id);

    // Construir la ruta de la carpeta utilizando el campo no_requisicion
    $requisitionFolder = 'requisicion/' . $requisicion->no_requisicion . '/';

        // Verificar si la carpeta existe en S3
        if (Storage::disk('local')->exists($requisitionFolder)) {
            // Obtener la lista de archivos en la carpeta de S3
            $archivos = Storage::disk('local')->files($requisitionFolder);

            if (count($archivos) > 0) {
                // Crear un archivo ZIP temporal para almacenar los archivos
                $zipFile = tempnam(sys_get_temp_dir(), 'requisicion_') . '.zip';
                $zip = new ZipArchive();

                if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
                    // Agregar cada archivo al archivo ZIP
                    foreach ($archivos as $archivo) {
                        $nombreArchivo = basename($archivo);
                        $archivoContenido = Storage::disk('local')->get($archivo);
                        $zip->addFromString($nombreArchivo, $archivoContenido);
                    }

                    $zip->close();

                    // Configurar la respuesta para descargar el archivo ZIP
                    return response()->download($zipFile, 'archivos_requisicion_' . $id . '.zip')->deleteFileAfterSend(true);
                } else {
                    return redirect()->route('SeguimientoRequisicion.index');

                    // Manejar el caso en que no se pueda crear el archivo ZIP
                    return alert('Se produjo un error al obtener la respuesta.');
                }
            } else {
                // Manejar el caso en que la carpeta esté vacía
                 return redirect()->route('SeguimientoRequisicion.index')->with('mensaje', 'Carpeta vacía');



                
            }
        } else {
            // Manejar el caso en que la carpeta no exista
                return redirect()->route('SeguimientoRequisicion.index')->with('mensaje', 'Carpeta no existente');
        }
    }
    public function imprimirRequisicion($id)
    {
        $image = 'assets/img/LogoNew2.png';
        $requisicion = Requisicion::with('detalles')->where('id_requisicion', $id)->firstOrFail();

        $pdf = Pdf::loadView('Requirente.Requisiciones.imprimir', compact('requisicion', 'image'));
        return $pdf->setPaper('Letter', 'landscape')->stream('requisicion_' . $id . '.pdf');
    }
}
