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
    }
}