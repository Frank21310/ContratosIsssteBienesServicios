<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::create([
            'nombre_estatus'=>'Pendiente',
        ]);
        Estado::create([
            'nombre_estatus'=>'Aprovado',
        ]);
        Estado::create([
            'nombre_estatus'=>'Finalizado',
        ]);
        Estado::create([
            'nombre_estatus'=>'Rechazado',
        ]);
    }
}
