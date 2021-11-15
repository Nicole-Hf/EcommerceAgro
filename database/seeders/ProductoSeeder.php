<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre'=>'super macollo',
            'descripcion'=>'abono para la hoja',
            'precio'=>'45',
            'imagen'=>'supermacollo.jpg',
            'stock'=>'10',
            'empresa_id'=>'1',
            'subcategoria_id'=>'1'
        ]);

        Producto::create([
            'nombre'=>'mamba',
            'descripcion'=>'insecticida',
            'precio'=>'90',
            'imagen'=>'mamba.jpg',
            'stock'=>'20',
            'empresa_id'=>'2',
            'subcategoria_id'=>'2'
        ]);

        Producto::create([
            'nombre'=>'super foliar',
            'descripcion'=>'abono para la hoja en polvo',
            'precio'=>'45',
            'imagen'=>'superfoliar.jpg',
            'stock'=>'40',
            'empresa_id'=>'1',
            'subcategoria_id'=>'3'
        ]);

        Producto::create([
            'nombre'=>'clorpirifos',
            'descripcion'=>'insecticida para la hoja',
            'precio'=>'65',
            'imagen'=>'clorpirifos.jpg',
            'stock'=>'25',
            'empresa_id'=>'1',
            'subcategoria_id'=>'1'
        ]);

        Producto::create([
            'nombre'=>'cipermetrina',
            'descripcion'=>'insecticida para el gusano',
            'precio'=>'45',
            'imagen'=>'cipermetrina.jpg',
            'stock'=>'30',
            'empresa_id'=>'1',
            'subcategoria_id'=>'4'
        ]);
    }
}
