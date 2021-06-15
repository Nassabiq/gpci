<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Anas Sabiq',
            'email' => 'nasirudinsabiq@gmail.com',
            'password' => bcrypt('anas1412'),
            'status' => 1,
        ]);
        $superadmin->assignRole('super-admin');
        
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gpci.or.id',
            'password' => bcrypt('admingpci'),
            'status' => 1,
        ]);
        $admin->assignRole('admin');
        
        $verifikator = User::create([
            'name' => 'verifikator',
            'email' => 'verifikator@gpci.or.id',
            'password' => bcrypt('verifikatorgpci'),
            'status' => 1,
        ]);
        $verifikator->assignRole('verifikator');
        
        $client = User::create([
            'name' => 'client',
            'email' => 'client@gpci.or.id',
            'password' => bcrypt('clientgpci'),
            'status' => 1,
        ]);
        $client->assignRole('client');

        $client = User::create([
            'name' => 'visitor',
            'email' => 'visitor@gpci.or.id',
            'password' => bcrypt('visitorgpci'),
            'status' => 1,
        ]);
        $client->assignRole('visitor');
    }
}
