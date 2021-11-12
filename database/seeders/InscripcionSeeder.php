<?php

namespace Database\Seeders;

use App\Models\Inscripcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inscripcion::factory(6)->create();
        DB::table('inscripciones')->insert(
            array(
                [
                    'estado' => 'aprobado',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'usuario_id' => 1,
                    'curso_id' => 1
                ],
                [
                    'estado' => 'desaprobado',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'usuario_id' => 1,
                    'curso_id' => 2
                ],
                [
                    'estado' => 'aprobado',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'usuario_id' => 2,
                    'curso_id' => 2
                ],
                [
                    'estado' => 'aprobado',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'usuario_id' => 3,
                    'curso_id' => 2
                ],
                [
                    'estado' => 'aprobado',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'usuario_id' => 3,
                    'curso_id' => 1
                ],
                [
                    'estado' => 'aprobado',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'usuario_id' => 4,
                    'curso_id' => 3
                ],
                [
                    'estado' => 'aprobado',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'usuario_id' => 4,
                    'curso_id' => 2
                ]
            )
        );
    }
}
