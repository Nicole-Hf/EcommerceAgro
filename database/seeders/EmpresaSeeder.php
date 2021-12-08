<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;
class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre'=>'Agromel',
            'perfil'=>'Fertilizantes',
            'nit'=>'1235478914',
            'tipo_negocio'=>'Comercial',
            'user_id'=>'2'
        ]);

        Empresa::create([
            'nombre'=>'TecnoAgro',
            'perfil'=>'Fungicidas',
            'nit'=>'254784135',
            'tipo_negocio'=>'Comercial',
            'user_id'=>'3'
        ]);
    }
}
