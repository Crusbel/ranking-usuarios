<?php

namespace Database\Seeders;

use App\Models\Tema;
use Database\Factories\TemaFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombre = 'Debido a la naturaleza circular de los archivos de declaración de Vue';
        // Tema::factory(4)->create();
        DB::table('temas')->insert(
            array(
                [
                    'nombre' => $nombre,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'curso_id' => 1
                ],
                [
                    'nombre' => $nombre,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'curso_id' => 1
                ],
                [
                    'nombre' => $nombre,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'curso_id' => 1
                ],
                [
                    'nombre' => $nombre,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'curso_id' => 2
                ],
                [
                    'nombre' => $nombre,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'curso_id' => 2
                ],
                [
                    'nombre' => $nombre,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'curso_id' => 3
                ],
            )
        );
    }
}
