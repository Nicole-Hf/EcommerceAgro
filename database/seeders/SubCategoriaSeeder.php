<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Seeder;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategoria::create([
            'nombre'=>'Insecticidas 1',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Insecticidas 2',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Insecticidas 3',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Fertilizante 1',
            'categoria_id' => '2'
        ]);

        Subcategoria::create([
            'nombre'=>'Insecticidas 2',
            'categoria_id' => '2'
        ]);
    }
}
