<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class SoloAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        switch(auth::user()->rol_id){
            case ('1'):
                return $next($request);//Administrador
            break;
            case ('2'):
                return redirect('Peticiones');//Requirente
            break;
            case ('3'):
                return redirect('Contratante');//Contratante
            break;
            case ('4'):
                return redirect('AdminContratos');//AdministradorContratos
            break;
            case ('5'):
                return redirect('Finanzas');//Finanzas
            break;
            case ('6'):
                return redirect('AreaNormativa');//Area Normativa
            break;
        } 
    }
}
