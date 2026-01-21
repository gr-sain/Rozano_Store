<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@gmail.com',
            'phone'    => '9999999999',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

       
        User::create([
            'name'     => 'Customer User',
            'email'    => 'customer@gmail.com',
            'phone'    => '8888888888',
            'password' => Hash::make('customer123'),
            'role'     => 'customer',
        ]);
    }
}
