<?php

namespace Database\Seeders;

use App\Models\Tarjeta;
use Illuminate\Database\Seeder;

class TarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tarjeta::create([
            'nombre' => 'Credit Card 1',
            'numero' => '2001557896',
            'cvv' => '1234',
            'fecha' => '12/22',
            'cliente_id' => '1',
        ]);

        Tarjeta::create([
            'nombre' => 'Credit Card 2',
            'numero' => '150427996',
            'cvv' => '2245',
            'fecha' => '06/25',
            'cliente_id' => '1',
        ]);
    }
}
