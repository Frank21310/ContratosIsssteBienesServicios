<?php

namespace Database\Seeders;

use App\Models\TipoContrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoContrato::create([
            'nombre_tipo'=>'Adjudicación directa',
        ]);
        TipoContrato::create([
            'nombre_tipo'=>'Invitación a cuando menos tres personas',
        ]);
        TipoContrato::create([
            'nombre_tipo'=>'Licitacion pública',
        ]);
    }
}
