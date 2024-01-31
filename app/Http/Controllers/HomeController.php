<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;


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

    
        return view('home', compact('totalUsuarios', 'totalEmpleados', 'totalProveedores'));
    }
}
