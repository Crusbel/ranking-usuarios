<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoPerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_perfil', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('perfil_id');
            // $table->unsignedBigInteger('curso_id');
            $table->timestamps();

            $table->foreignId('curso_id')
                ->nullable()
                ->constrained('cursos')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('perfil_id')
                ->nullable()
                ->constrained('perfiles')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_perfil');
    }
}
