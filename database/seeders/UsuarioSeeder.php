<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert(
            array(
                [
                    'nombre' => 'Crusbel',
                    'dni' => 48221252,
                    'perfil_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'nombre' => 'Juan',
                    'dni' => 47474747,
                    'perfil_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'nombre' => 'Marcos',
                    'dni' => 89898989,
                    'perfil_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'nombre' => 'Carlos',
                    'dni' => 48484848,
                    'perfil_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            )
        );
    }
}
