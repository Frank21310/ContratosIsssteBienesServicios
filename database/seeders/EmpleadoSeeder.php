<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::create([
            'num_empleado'=>'19920182',
            'nombre'=>'Francisco Daniel',
            'apellido_paterno'=>'Santaella',
            'apellido_materno'=>'Ruiz',
            'cargo_id'=>'1',
            'dependencia_id'=>'1',
        ]);
        Empleado::create([
            'num_empleado'=>'19920153',
            'nombre'=>'Alicia',
            'apellido_paterno'=>' Garcia ',
            'apellido_materno'=>'Pacheco',
            'cargo_id'=>'2',
            'dependencia_id'=>'1',
        ]);
        Empleado::create([
            'num_empleado'=>'00000001',
            'nombre'=>'Administrador',
            'apellido_paterno'=>' Contratos ',
            'apellido_materno'=>'Contratos',
            'cargo_id'=>'3',
            'dependencia_id'=>'1',
        ]);
    }
}
