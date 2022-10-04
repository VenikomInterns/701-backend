<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Admin',
            'is_admin' => true,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]); //excellent
        User::query()->create([
            'name' => 'Dushan',
            'is_admin' => false,
            'email' => 'dushan@gmail.com',
            'password' => Hash::make('dushan123'),
        ]);
    }
}
