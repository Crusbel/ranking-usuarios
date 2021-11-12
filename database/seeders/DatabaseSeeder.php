<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PerfilSeeder::class,
            CursoSeeder::class,
            TemaSeeder::class,
            UsuarioSeeder::class,
            InscripcionSeeder::class,
            CursoPerfilSeeder::class,
            EvaluacionSeeder::class
        ]);
    }
}
