<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \bcrypt('123456'),
            'phone' => '01064564850',
            'type' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => \bcrypt('123456'),
            'phone' => '01064564855',
            'type' => 'user',
        ]);
    }
}
