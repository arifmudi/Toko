<?php

use App\User;
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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@toko.com',
            'password' => bcrypt('harimau23'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@toko.com',
            'password' => bcrypt('harimau23'),
        ]);

        $user->assignRole('user');
    }
}
