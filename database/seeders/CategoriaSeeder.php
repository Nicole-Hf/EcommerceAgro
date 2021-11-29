<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=>'Nutrición Animal'
        ]);

        Categoria::create([
            'nombre'=>'Semillas de Sorgo'
        ]);

        Categoria::create([
            'nombre'=>'Sanidad Animal'
        ]);

        Categoria::create([
            'nombre'=>'Semillas de Pasto'
        ]);

        Categoria::create([
            'nombre'=>'Semillas de Maíz'
        ]);
    }
}
