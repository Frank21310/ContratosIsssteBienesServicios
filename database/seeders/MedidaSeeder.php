<?php

namespace Database\Seeders;

use App\Models\Medida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medida::create([
            'nombre_medida'=>'Servicio',
        ]);
        Medida::create([
            'nombre_medida'=>'Pieza',
        ]);
        Medida::create([
            'nombre_medida'=>'Kilogramo',
        ]);
        Medida::create([
            'nombre_medida'=>'Litro',
        ]);
    }
}
