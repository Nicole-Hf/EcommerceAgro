<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Passport\Client;
use Laravel\Passport\PersonalAccessClient;

class OauthClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'Client1',
            'secret' => 'MwBTxJIngyeBfGGqjevGiGdmfJpv6ahR3IccBOzn',
            'redirect' => 'http://localhost',
            'personal_access_client' => 'true',
            'password_client' => 'false',
            'revoked' => 'false',
        ]);

        Client::create([
            'name' => 'Client2',
            'secret' => '8oHeKKwMNF07xT63tBXFNTMre0uTfhgJjPOzJAoy',
            'redirect' => 'http://localhost',
            'personal_access_client' => 'true',
            'password_client' => 'false',
            'revoked' => 'false',
        ]);

        Client::create([
            'name' => 'Client3',
            'secret' => 'qeJB5yBT0mUAmshrIciZGTuX0VYoEyBJsCOwkLvm',
            'redirect' => 'http://localhost',
            'personal_access_client' => 'true',
            'password_client' => 'false',
            'revoked' => 'false',
        ]);

        PersonalAccessClient::create([
            'client_id' => '1'
        ]);

        PersonalAccessClient::create([
            'client_id' => '2'
        ]);

        PersonalAccessClient::create([
            'client_id' => '3'
        ]);
    }
}
