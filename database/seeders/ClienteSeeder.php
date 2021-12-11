<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre' => 'Beatriz Pinzon',
            'telefono' => '60845721',
            'razonSocial' => '8946039',
            'user_id' => '4'
        ]);

        Cliente::create([
            'nombre' => 'Bugra Gulsoy',
            'telefono' => '76625186',
            'razonSocial' => '4517715',
            'user_id' => '5'
        ]);
    }
}
