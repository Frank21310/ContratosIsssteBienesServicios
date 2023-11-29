<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detallerequisiciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisicion_id')
            ->references('id_requisicion')
            ->on('requisiciones');

            $table->foreignId('num_partida')
            ->references('id_partida')
            ->on('partidas');

            $table->foreignId('cucop')
            ->references('id_cucop')
            ->on('insumos');

            $table->foreignId('descripcion')
            ->references('id_cucop')
            ->on('insumos');

            $table->float('cantidad');

            $table->foreignId('medida_id')
            ->references('id_medida')
            ->on('medida');

            $table->float('precio');
            $table->float('importe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallerequisiciones');
    }
};
