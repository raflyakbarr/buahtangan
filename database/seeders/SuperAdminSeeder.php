<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'arafly12@yahoo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'role' => 'super_admin',
        ]);
    }
}