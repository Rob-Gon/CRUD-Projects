<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Proyecto;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyectos')->insert([
            'nombre' => 'Proyecto '.rand(1,10),
            'descripcion' => Str::random(40),
            'categoria' => 'Categoria '.rand(1,10),
            'precio' => rand(500,10000),
            'estado' => rand(1,4),
        ]);

        Proyecto::factory(100)->create();
    }
}
