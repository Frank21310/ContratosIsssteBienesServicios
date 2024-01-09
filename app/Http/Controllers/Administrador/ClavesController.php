<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use Illuminate\Http\Request;

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
        $archivo = $request->file('archivo_csv');

        $manejador_archivo = fopen($archivo, 'r');
        $titulos = fgetcsv($manejador_archivo); // Obtener los títulos

        while (($fila = fgetcsv($manejador_archivo, 0, ',')) !== false) {
            $datos = array_combine($titulos, $fila);

            $id_cucop = $datos['id_cucop']; // Supongamos que el título de la columna del ID es 'id'

            $insumo = Insumo::updateOrCreate(
                ['id_cucop' => $id_cucop],
                [
                    'clave_cucop' => $datos['clave_cucop'],
                    'partida_id' => $datos['partida_id'],
                    'descripcion' => $datos['descripcion'],
                    'CABM' => $datos['CABM'],
                    'tipo_contratacion' => $datos['tipo_contratacion'],
                ]
            );
        }

        fclose($manejador_archivo);

        return redirect()->back()->with('success', 'Insumos agregados exitosamente.');
    }
}

}
