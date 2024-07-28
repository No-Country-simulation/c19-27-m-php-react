<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone_number' => '1234567890',
            'address' => '123 Main St',
            'house_number' => '456',
            'street' => 'Main St',
            'city' => 'Anytown',
            'state' => 'Anyprovince',
            'password' => Hash::make('11111111'),
        ]);
    }
}
