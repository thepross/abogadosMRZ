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
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->text('detalle');
            $table->date('fecha');
            $table->string('autoridad');
            $table->string('involucrados');
            $table->string('observaciones');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->boolean('disabled')->default(0);
            $table->string('documento')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casos');
    }
};
