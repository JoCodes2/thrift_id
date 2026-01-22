<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'id' => Str::uuid(),
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'super-admin',
            'password' => Hash::make('12345678'),
            'no_hp' => '08123456789',
            'alamat' => 'Palu',
        ]);
        $user->createToken('auth_token')->plainTextToken;
    }
}
