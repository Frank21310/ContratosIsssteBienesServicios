<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClavesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $CUCops = Insumo::select('*')->orderBy('clave_cucop', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $CUCops = $CUCops
                ->where('clave_cucop', 'like', '%' . $request->search . '%')
                ->orWhere('partida_id', 'like', '%' . $request->search . '%')
                ->orWhere('descripcion', 'like', '%' . $request->search . '%')
                ->orWhere('CABM', 'like', '%' . $request->search . '%')
                ->orWhere('tipo_contratacion', 'like', '%' . $request->search . '%');
        }
        $CUCops = $CUCops->paginate($limit)->appends($request->all());
        return view('Administrador.Claves.index', compact('CUCops'));
    }

    public function procesarArchivo(Request $request)
    {
        if ($request->hasFile('archivo_csv')) {
            $file = $request->file('archivo_csv');

            // Procesar el archivo CSV
            $csvData = array_map('str_getcsv', file($file));
            $keys = array_shift($csvData); // Obtener los encabezados

            foreach ($csvData as $row) {
                $data = array_combine($keys, $row);

                // Verificar si existe la clave_cucop en la tabla
                $insumo = Insumo::where('clave_cucop', $data['clave_cucop'])->first();

                if ($insumo) {
                    // Si existe, actualizar los valores
                    $insumo->update([
                        'partida_id' => $data['partida_id'],
                        'descripcion' => $data['descripcion'],
                        'CABM' => $data['CABM'],
                        'tipo_contratacion' => $data['tipo_contratacion'],
                        // ... otros campos que desees actualizar
                    ]);
                } else {
                    // Si no existe, crear un nuevo registro
                    Insumo::create([
                        'clave_cucop' => $data['clave_cucop'],
                        'partida_id' => $data['partida_id'],
                        'descripcion' => $data['descripcion'],
                        'CABM' => $data['CABM'],
                        'tipo_contratacion' => $data['tipo_contratacion'],
                        // ... otros campos que desees insertar
                    ]);
                }
            }

            // Redireccionar o mostrar un mensaje de éxito
            return redirect()->back()->with('success', 'Archivo procesado correctamente.');
        }

        // Manejar el caso en que no se haya proporcionado un archivo
        return redirect()->back()->with('error', 'No se ha seleccionado un archivo.');
    }
}
