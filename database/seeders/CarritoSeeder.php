<?php

namespace Database\Seeders;

use App\Models\Carrito;
use App\Models\CarritoProducto;
use Illuminate\Database\Seeder;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrito::create([
            'cliente_id' => '1'
        ]);

        Carrito::create([
            'cliente_id' => '2'
        ]);

        CarritoProducto::create([
            'carrito_id' => '1',
            'producto_id' => '1',
            'cantidad' => '4',
            'subtotal' => '180'
        ]);

        CarritoProducto::create([
            'carrito_id' => '1',
            'producto_id' => '3',
            'cantidad' => '1',
            'subtotal' => '45'
        ]);

        CarritoProducto::create([
            'carrito_id' => '1',
            'producto_id' => '4',
            'cantidad' => '2',
            'subtotal' => '130'
        ]);

        CarritoProducto::create([
            'carrito_id' => '2',
            'producto_id' => '1',
            'cantidad' => '1',
            'subtotal' => '45'
        ]);

        CarritoProducto::create([
            'carrito_id' => '2',
            'producto_id' => '3',
            'cantidad' => '3',
            'subtotal' => '135'
        ]);
    }
}
