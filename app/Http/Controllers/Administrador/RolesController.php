<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Permisos;
use App\Models\Rol;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RolesController extends Controller
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
        $rols = Rol::select('*')->orderBy('id_rol', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $rols = $rols->where('id_rol', 'like', '%' . $request->search . '%')
                ->orWhere('nombre_rol', 'like', '%' . $request->search . '%');
        }
        $rols = $rols->paginate($limit)->appends($request->all());
        return view('Administrador.roles.index', compact('rols'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permisos = Permisos::all();

        return view('Administrador.roles.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol = $this->createUpdateRol($request, $rol);
        return redirect()
            ->route('roles.index');
    }
    public function createUpdateRol(Request $request, $rol)
    {
        $rol->nombre_rol = $request->nombre_rol;
        $rol->permiso_id = $request->permiso_id;
        $rol->save();
        return  $rol;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permisos = Permisos::all();
        $rol = Rol::where('id_rol', $id)->firstOrFail();
        return view('Administrador.roles.show', compact('rol', 'permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permisos = Permisos::all();
        $rol = Rol::where('id_rol', $id)->firstOrFail();
        return view('Administrador.roles.edit', compact('rol','permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $rol = Rol::where('id_rol', $id)->firstOrFail();
            $rol = $this->createUpdateRol($request, $rol);
            return redirect()
                ->route('roles.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        
        return redirect()->route('roles.index');
    } catch (\Exception $e) {
        // Maneja la excepción aquí (puedes mostrar un mensaje de error, registrar la excepción, etc.)
        return redirect()->route('roles.index')->with('error', 'No se pudo eliminar el registro.');
    }
}
}

