<?php

namespace App\Http\Controllers\Requirente;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('solorequirente', ['only' => ['index']]);
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index(Request $request)
   {
       $CUCops = Insumo::select('*')->orderBy('clave_cucop', 'ASC');
       $limit = (isset($request->limit)) ? $request->limit : 10;

       if (isset($request->search)) {
           $CUCops = $CUCops
               ->where('clave_cucop', 'like', '%' . $request->search . '%')
               ->orWhere('partida_id', 'like', '%' . $request->search . '%')
               ->orWhere('descripcion', 'like', '%' . $request->search . '%')
               ->orWhere('CABM', 'like', '%' . $request->search . '%')
               ->orWhere('tipo_contratacion', 'like', '%' . $request->search . '%');
       }
       $CUCops = $CUCops->paginate($limit)->appends($request->all());
       return view('Requirente.Insumos.index', compact('CUCops'));

   }

}

