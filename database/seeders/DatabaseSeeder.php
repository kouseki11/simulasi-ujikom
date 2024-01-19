<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nisn' => 'admin_nisn',
            'gender' => 'Laki-Laki',
            'name' => 'Admin Name',
            'school' => 'Admin School',
            'email' => 'admin@example.com',
            'phone_number' => '1234567890',
            'minat_jurusan' => 'PPLG',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}
