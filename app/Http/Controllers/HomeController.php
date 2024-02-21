<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use App\Models\Proveedor;
use App\Models\Requisicion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsuarios = User::count();
        $totalEmpleados = Empleado::count();
        $totalProveedores = Proveedor::count();
        $numEmpleado = Auth::user()->num_empleado;

// Obtén el total de requisiciones para ese usuario
$totalRequisicionesUsuario = Requisicion::where('solicita', $numEmpleado)->count();


    
        return view('home', compact('totalUsuarios', 'totalEmpleados', 'totalProveedores','totalRequisicionesUsuario'));
    }
}
