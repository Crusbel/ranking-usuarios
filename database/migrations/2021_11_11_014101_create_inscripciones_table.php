<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['cursando', 'desaprobado', 'aprobado']);
            // $table->unsignedBigInteger('usuario_id');
            // $table->unsignedBigInteger('curso_id');
            $table->timestamps();

            $table->foreignId('usuario_id')
                ->nullable()
                ->constrained('usuarios')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('curso_id')
                ->nullable()
                ->constrained('cursos')
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
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropForeign('inscripciones_usuario_id_foreign');
            $table->dropForeign('inscripciones_curso_id_foreign');
        });
        Schema::dropIfExists('inscripciones');
    }
}
