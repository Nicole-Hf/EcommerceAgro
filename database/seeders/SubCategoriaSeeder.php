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
            'nombre'=>'Suplemento Mineral',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Suplemento Estratégico',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Alimento Balanceado',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Núcleo Balanceado',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Suplemento Mineral Potencializado',
            'categoria_id' => '1'
        ]);

        Subcategoria::create([
            'nombre'=>'Semilla de Sorgo',
            'categoria_id' => '2'
        ]);

        Subcategoria::create([
            'nombre'=>'Ectoparasiticidas',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Endectocidas',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Terapéuticos',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Biológicos',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Reproducción',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Fortificante',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Vacuna Reproductiva',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Vacuna Clostridio',
            'categoria_id' => '3'
        ]);

        Subcategoria::create([
            'nombre'=>'Brachiaria',
            'categoria_id' => '4'
        ]);

        Subcategoria::create([
            'nombre'=>'Panicum',
            'categoria_id' => '4'
        ]);
    }
}
