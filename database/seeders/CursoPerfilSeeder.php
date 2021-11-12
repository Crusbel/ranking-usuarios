<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CursoPerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curso_perfil')->insert(
            array(
                [
                    'perfil_id' => 2,
                    'curso_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'perfil_id' => 2,
                    'curso_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'perfil_id' => 1,
                    'curso_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            )
        );
    }
}
