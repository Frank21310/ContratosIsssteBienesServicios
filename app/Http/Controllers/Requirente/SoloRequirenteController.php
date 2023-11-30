<?php

namespace App\Http\Controllers\Requirente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoloRequirenteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solorequirente',['only'=>['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('requierente');

    }

}
