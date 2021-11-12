<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert(
            array(
                [
                    'nombre' => 'Introducción a PHP',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'nombre' => 'Introducción a Laravel',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'nombre' => 'Primeros auxilios',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            )
        );
    }
}
