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
            'imagen'=>'/storage/imagenes/vABS8hrtJvsupermacollo.jpg',
            'stock'=>'10',
            'empresa_id'=>'1',
            'subcategoria_id'=>'1',
            'categoria'=>'1'
        ]);

        Producto::create([
            'nombre'=>'mamba',
            'descripcion'=>'insecticida',
            'precio'=>'90',
            'imagen'=>'/storage/imagenes/EiRq8Fvw2Gmamba.jpg',
            'stock'=>'20',
            'empresa_id'=>'2',
            'subcategoria_id'=>'2',
            'categoria'=>'1'
        ]);

        Producto::create([
            'nombre'=>'super foliar',
            'descripcion'=>'abono para la hoja en polvo',
            'precio'=>'45',
            'imagen'=>'/storage/imagenes/l3bB5PNRBbsuperfoliar.jpg',
            'stock'=>'40',
            'empresa_id'=>'1',
            'subcategoria_id'=>'3',
            'categoria'=>'2'
        ]);

        Producto::create([
            'nombre'=>'clorpirifos',
            'descripcion'=>'insecticida para la hoja',
            'precio'=>'65',
            'imagen'=>'/storage/imagenes/ZSGdNjBMRGclorpirifos.jpg',
            'stock'=>'25',
            'empresa_id'=>'1',
            'subcategoria_id'=>'1',
            'categoria'=>'3'
        ]);

        Producto::create([
            'nombre'=>'cipermetrina',
            'descripcion'=>'insecticida para el gusano',
            'precio'=>'45',
            'imagen'=>'/storage/imagenes/Wrby6u2MtScipermetrina.jpg',
            'stock'=>'30',
            'empresa_id'=>'1',
            'subcategoria_id'=>'4',
            'categoria'=>'2'
        ]);
    }
}
