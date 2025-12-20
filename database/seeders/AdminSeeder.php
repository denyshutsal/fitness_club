<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'role_id' => Role::where('role', 'admin')->first()->id,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $admin->phones()->create([
            'phone' => '71234567890',
        ]);
    }
}