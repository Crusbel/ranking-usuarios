<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            // $table->unsignedBigInteger('curso_id');
            $table->timestamps();

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
        Schema::table('temas', function (Blueprint $table) {
            $table->dropForeign('temas_curso_id_foreign');
        });
        Schema::dropIfExists('temas');
    }
}
