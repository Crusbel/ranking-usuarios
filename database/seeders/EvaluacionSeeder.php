<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluaciones')->insert(
            array(
                [
                    'nota' => 15,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'intento' => 1,
                    'tema_id' => 1,
                    'inscripcion_id' => 1
                ],
                [
                    'nota' => 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'intento' => 3,
                    'tema_id' => 4,
                    'inscripcion_id' => 2
                ],
                [
                    'nota' => 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'intento' => 3,
                    'tema_id' => 3,
                    'inscripcion_id' => 2
                ],
                [
                    'nota' => 20,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'intento' => 2,
                    'tema_id' => 3,
                    'inscripcion_id' => 3
                ],
                [
                    'nota' => 16,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'intento' => 2,
                    'tema_id' => 3,
                    'inscripcion_id' => 4
                ],
                [
                    'nota' => 17,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'intento' => 1,
                    'tema_id' => 3,
                    'inscripcion_id' => 5
                ]
            )
        );
    }
}
