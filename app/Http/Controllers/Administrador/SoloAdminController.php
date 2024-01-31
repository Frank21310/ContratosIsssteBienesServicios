<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoloAdminController extends Controller
{
    /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('soloadministrador',['only'=>['index']]);
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
            return view('home', compact('totalUsuarios', 'totalEmpleados'));   
        }
        
    }
    