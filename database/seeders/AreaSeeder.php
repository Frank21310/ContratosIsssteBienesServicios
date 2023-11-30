<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::create([
            'nombre_area'=>'Direccion',
            'dependencia_id'=>'1'
        ]);
        Area::create([
            'nombre_area'=>'Administracion',
            'dependencia_id'=>'1' 
        ]);
        Area::create([
            'nombre_area'=>'Departamento de Finanzas',
            'dependencia_id'=>'1'
        ]);
        Area::create([
            'nombre_area'=>'Departamento de Recursos Materiales y Obras',
            'dependencia_id'=>'1'
        ]);
        Area::create([
            'nombre_area'=>'Almacen',
            'dependencia_id'=>'1'
        ]);
        Area::create([
            'nombre_area'=>'Departamento de Sistemas',
            'dependencia_id'=>'1'
        ]);
    }
}
