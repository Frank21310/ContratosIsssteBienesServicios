<?php

namespace App\Http\Controllers\AdminContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoloAdminContratosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmincontratos',['only'=>['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('admincontratos');   
    }
}
