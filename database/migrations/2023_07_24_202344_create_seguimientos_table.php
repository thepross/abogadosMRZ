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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->date('fecha');
            $table->string('responsable');
            $table->string('estado');
            $table->string('observaciones');
            $table->string('acciones');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_caso');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_caso')->references('id')->on('casos');
            $table->boolean('disabled')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
