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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements('id_proveedor');
            $table->string('rfc');
            $table->string('pais');
            $table->string('entidad_federativa');
            $table->string('estratificacion');
            $table->string('tipo de usuario');
            $table->string('sector');
            $table->string('giro');
            $table->string('grado_cumplimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
