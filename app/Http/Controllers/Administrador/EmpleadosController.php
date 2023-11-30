<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Dependencia;
use App\Models\Empleado;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
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
        $Empleados = Empleado::select('*')->orderBy('num_empleado', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $Empleados = $Empleados->where('num_empleado', 'like', '%' . $request->search . '%')
                ->orWhere('nombre', 'like', '%' . $request->search . '%')
                ->orWhere('apellido_paterno', 'like', '%' . $request->search . '%')
                ->orWhere('apellido_materno', 'like', '%' . $request->search . '%')
                ->orWhere('cargo_id', 'like', '%' . $request->search . '%')
                ->orWhere('dependencia_id', 'like', '%' . $request->search . '%');
        }
        $Empleados = $Empleados->paginate($limit)->appends($request->all());
        return view('Administrador.Empleados.index', compact('Empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::all();
        $dependecias = Dependencia::all();
        return view('Administrador.Empleados.create', compact('cargos', 'dependecias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Empleado = new Empleado();
        $Empleado = $this->createUpdateEmpleado($request, $Empleado);
        return redirect()
            ->route('Empleados.index');
    }
    public function createUpdateEmpleado(Request $request, $Empleado)
    {
        $Empleado->nombre = $request->nombre;
        $Empleado->apellido_paterno = $request->apellido_paterno;
        $Empleado->apellido_materno = $request->apellido_materno;
        $Empleado->cargo_id = $request->cargo_id;
        $Empleado->dependencia_id = $request->dependencia_id;
        $Empleado->save();
        return  $Empleado;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cargos = Cargo::all();
        $dependecias = Dependencia::all();
        $Empleado = Empleado::where('num_empleado', $id)->firstOrFail();
        return view('Administrador.Empleados.show', compact('Empleado', 'cargos', 'dependecias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cargos = Cargo::all();
        $dependecias = Dependencia::all();
        $Empleado = Empleado::where('num_empleado', $id)->firstOrFail();
        return view('Administrador.Empleados.edit', compact('Empleado', 'cargos', 'dependecias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $Empleado = Empleado::where('num_empleado', $id)->firstOrFail();
            $Empleado = $this->createUpdateEmpleado($request, $Empleado);
            return redirect()
                ->route('Empleados.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        try {
            $Empleado = Empleado::findOrFail($id);
            $Empleado->delete();

            return redirect()->route('Empleados.index');
        } catch (\Exception $e) {
            // Maneja la excepción aquí (puedes mostrar un mensaje de error, registrar la excepción, etc.)
            return redirect()->route('Empleados.index')->with('error', 'No se pudo eliminar el registro.');
        }
    }
}
