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
        Schema::create('portadas', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('titulo');

            $table->datetime('inicio');
            $table->datetime('fin')->nullable();

            $table->boolean('activo')->default(true);

            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portadas');
    }
};
