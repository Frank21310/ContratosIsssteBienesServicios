<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'nombre_rol'=>'Administrador',
            'permiso_id'=>'1',
        ]);
        Rol::create([
            'nombre_rol'=>'Requirente',
            'permiso_id'=>'2',
        ]);
        Rol::create([
            'nombre_rol'=>'Contratante',
            'permiso_id'=>'3',
        ]);
        Rol::create([
            'nombre_rol'=>'AdminContratos',
            'permiso_id'=>'3',
        ]);
        Rol::create([
            'nombre_rol'=>'finanzas',
            'permiso_id'=>'3',
        ]);
        Rol::create([
            'nombre_rol'=>'areanormativa',
            'permiso_id'=>'3',
        ]);
    }
}
