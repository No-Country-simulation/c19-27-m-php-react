<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name'=>'Homero',
            'email'=>'hs@123.com',
            'password'=>Hash::make('hs'),
            'current_team_id'=>1
        ]);
        User::updateOrCreate([
            'name'=>'Marge',
            'email'=>'mg@123.com',
            'password'=>Hash::make('mg'),
            'current_team_id'=>1
        ]);
        User::updateOrCreate([
            'name'=>'juan',
            'email'=>'jm@123.com',
            'password'=>Hash::make('jm'),
            'current_team_id'=>1
        ]);
    }
}
