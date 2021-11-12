<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nota');
            $table->tinyInteger('intento');
            $table->boolean('aprobado')->default(0)->change();
            // $table->unsignedBigInteger('tema_id');
            // $table->unsignedBigInteger('inscripcion_id');
            $table->timestamps();

            $table->foreignId('tema_id')
                ->nullable()
                ->constrained('temas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('inscripcion_id')
                ->nullable()
                ->constrained('inscripciones')
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
        Schema::table('evaluaciones', function (Blueprint $table) {
            $table->dropForeign('evaluaciones_tema_id_foreign');
            $table->dropForeign('evaluaciones_inscripcion_id_foreign');
        });
        Schema::dropIfExists('evaluaciones');
    }
}
