<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\factu;

class FactuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factu::create([
            'pago_id'=>'1',
            'carrito_id'=>'1'
        ]);

        factu::create([
            'pago_id'=>'2',
            'carrito_id'=>'2'
        ]);

        factu::create([
            'pago_id'=>'3',
            'carrito_id'=>'3'
        ]);
    }
}
