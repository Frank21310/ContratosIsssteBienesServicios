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
            'descripcion_medida'=>'Servicio',
        ]);
        Medida::create([
            'descripcion_medida'=>'Pieza',
        ]);
        Medida::create([
            'descripcion_medida'=>'Kilogramo',
        ]);
        Medida::create([
            'descripcion_medida'=>'Litro',
        ]);
    }
}
