<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::create([
            'nombre_Cargo'=>'Jefe de area',
        ]);
        Cargo::create([
            'nombre_Cargo'=>'SubDelegado',
        ]);
        Cargo::create([
            'nombre_Cargo'=>'Delegado Estatal',
        ]);
        Cargo::create([
            'nombre_Cargo'=>'Administrador',
        ]);
    }
}
