<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Perfil::factory(3)->create()->unique();
        DB::table('perfiles')->insert(
            array(
                [
                    'nombre' => 'Médico',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'nombre' => 'Ingeniero',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'nombre' => 'Contador',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            )
        );
    }
}
