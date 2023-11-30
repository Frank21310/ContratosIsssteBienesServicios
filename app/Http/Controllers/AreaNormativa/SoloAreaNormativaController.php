<?php

namespace App\Http\Controllers\AreaNormativa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoloAreaNormativaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloareanormativa',['only'=>['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('anormativa');   
    }

    
}

