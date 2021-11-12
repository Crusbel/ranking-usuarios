<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('intento');
            $table->tinyInteger('nota');
            // $table->unsignedBigInteger('evaluacion_id');
            $table->timestamps();

            $table->foreignId('evaluacion_id')
                ->nullable()
                ->constrained('evaluaciones')
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
        Schema::table('historial', function (Blueprint $table) {
            $table->dropForeign('historial_evaluacion_id_foreign');
        });
        Schema::dropIfExists('historial');
    }
}
