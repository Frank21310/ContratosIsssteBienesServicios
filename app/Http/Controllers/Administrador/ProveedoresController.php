<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadministrador', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $proveedores = Proveedor::select('*')->orderBy('id_proveedor', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 4;

        if (isset($request->search)) {
            $proveedores = $proveedores->where('id_proveedor', 'like', '%' . $request->search . '%')
                ->orWhere('nombre_proveedor', 'like', '%' . $request->search . '%');
        }
        $proveedores = $proveedores->paginate($limit)->appends($request->all());
        return view('Administrador.Proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Administrador.Proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor = $this->createUpdateRol($request, $proveedor);
        return redirect()
            ->route('Proveedores.index');
    }
    public function createUpdateRol(Request $request, $proveedor)
    {
        $proveedor->nombre_proveedor = $request->nombre_proveedor ;
        $proveedor->rfc = $request->rfc ;
        $proveedor->pais = $request->pais ;
        $proveedor->entidad_federativa = $request->entidad_federativa ;
        $proveedor->estratificacion = $request->estratificacion ;
        $proveedor->tipo_usuario = $request->tipo_usuario ;
        $proveedor->sector = $request->sector ;
        $proveedor->giro = $request->giro ;
        $proveedor->grado_cumplimiento = $request->grado_cumplimiento ;
        $proveedor->save();
        return  $proveedor;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = Proveedor::where('id_proveedor', $id)->firstOrFail();
        return view('Administrador.Proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedor::where('id_proveedor', $id)->firstOrFail();
        return view('Administrador.Proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $proveedor = Proveedor::where('id_proveedor', $id)->firstOrFail();
            $proveedor = $this->createUpdateRol($request, $proveedor);
            return redirect()
                ->route('Proveedores.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();

            return redirect()->route('Proveedores.index');
        } catch (\Exception $e) {
            // Maneja la excepción aquí (puedes mostrar un mensaje de error, registrar la excepción, etc.)
            return redirect()->route('Proveedores.index')->with('error', 'No se pudo eliminar el registro.');
        }
    }
}
