<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    use RegistersUsers;

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
        $Users = User::select('*')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 4;

        if (isset($request->search)) {
            $Users = $Users->where('empleado_num', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('rol_id', 'like', '%' . $request->search . '%');
        }
        $Users = $Users->paginate($limit)->appends($request->all());
        return view('Administrador.Usuarios.index', compact('Users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleado::all();
        $roles = Rol::all();

        return view('Administrador.Usuarios.create', compact('empleados', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'empleado_num' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_rol' => ['required', 'integer'],
        ]);

        User::create([
            'empleado_num' => $data['empleado_num'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rol_id' => $data['id_rol'],
        ]);
        return redirect()
        ->route('Usuarios.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Users = User::where('empleado_num', $id)->firstOrFail();
        return view('Administrador.Usuarios.show', compact('Users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleados = Empleado::all();
        $roles = Rol::all();

        $User = User::where('empleado_num', $id)->firstOrFail();
        return view('Administrador.Usuarios.edit', compact('User', 'empleados', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'empleado_num' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'id_rol' => ['required', 'integer'],
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'empleado_num' => $data['empleado_num'],
            'email' => $data['email'],
            'rol_id' => $data['id_rol'],
        ]);

        $users = User::all(); // Obtener todos los usuarios

        return view('Administrador.Usuarios.index', compact('users'));
    }



    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
    {
        try {
            $User = User::findOrFail($id);
            $User->delete();

            return redirect()->route('Usuarios.index');
        } catch (\Exception $e) {
            // Maneja la excepción aquí (puedes mostrar un mensaje de error, registrar la excepción, etc.)
            return redirect()->route('Usuarios.index')->with('error', 'No se pudo eliminar el registro.');
        }
    }
}
