<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Domicilio;
use App\Models\Persona;
use App\Models\Proveedor;
use App\Models\TipoCaracter;
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
        $tipopersona = Persona::all();
        $tipocaracters = TipoCaracter::all();
        $personas = Persona::all();
        return view('Administrador.Proveedores.create', compact('personas', 'tipopersona', 'tipocaracters'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor = $this->createUpdateproveedor($request, $proveedor);
        return redirect()
            ->route('Proveedores.index');
    }
    public function createUpdateproveedor(Request $request, $proveedor)
    {
        $proveedor->persona_id = $request->persona_id;
        $proveedor->nombre = $request->nombre;
        $proveedor->rfc = $request->rfc;
        $proveedor->nacionalidad = $request->nacionalidad;
        $domicilio = new Domicilio();
        $domicilio->calle = $request->calle;
        $domicilio->municipio = $request->municipio;
        $domicilio->codigo_postal = $request->codigo_postal;
        $domicilio->estado = $request->estado;
        $domicilio->pais = $request->pais;
        $domicilio->save();
        $proveedor->domicilio_id = $domicilio->id_domicilio;
        $proveedor->documento_expedicion = $request->documento_expedicion;
        $proveedor->institucion_expedida = $request->institucion_expedida;
        $proveedor->instrumento_publico = $request->instrumento_publico;
        $proveedor->registro_publico = $request->registro_publico;
        $proveedor->folio_registro = $request->folio_registro;
        $proveedor->fecha_registro = $request->fecha_registro;
        $proveedor->representante = $request->representante;
        $proveedor->caracter_id = $request->caracter_id;
        $proveedor->instrumento_notarial_representante = $request->instrumento_notarial_representante;
        $proveedor->save();
        return  $proveedor;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipopersona = Persona::all();
        $tipocaracters = TipoCaracter::all();
        $personas = Persona::all();
        return view('Administrador.Proveedores.show', compact('personas', 'tipopersona', 'tipocaracters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipopersona = Persona::all();
        $tipocaracters = TipoCaracter::all();
        $personas = Persona::all();
        $proveedor = Proveedor::where('id_proveedor', $id)->firstOrFail();
        return view('Administrador.Proveedores.edit', compact('proveedor', 'personas', 'tipopersona', 'tipocaracters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $proveedor = Proveedor::where('id_proveedor', $id)->firstOrFail();
            $proveedor = $this->createUpdateproveedor($request, $proveedor);
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
