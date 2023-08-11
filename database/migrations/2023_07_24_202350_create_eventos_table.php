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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('responsable');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_seguimiento')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_seguimiento')->references('id')->on('seguimientos');
            $table->boolean('disabled')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
