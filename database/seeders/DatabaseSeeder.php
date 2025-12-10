<?php

namespace Database\Seeders;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $admin->phones()->create([
            'phone' => '71234567890',
        ]);

        $user = User::factory()
            ->count(10)
            ->has(Phone::factory())
            ->create();
    }
}
