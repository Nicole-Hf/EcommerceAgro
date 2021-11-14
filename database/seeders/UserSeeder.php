<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'UserAdmin',
            'email' => 'iiagroshop@gmail.com',
            'password' => bcrypt('agroshop123'),
            'role_id' => '1'
        ])->assignRole('Admin');

        User::create([
            'name' => 'Toto',
            'email' => 'toto@gmail.com',
            'password' => bcrypt('1234567890'),
            'role_id' => '3'
        ])->assignRole('Empresa');

        User::create([
            'name' => 'Tata',
            'email' => 'tata@gmail.com',
            'password' => bcrypt('0987654321'),
            'role_id' => '2'
        ])->assignRole('Cliente');
    }
}