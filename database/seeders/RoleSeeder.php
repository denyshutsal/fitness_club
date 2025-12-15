<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Sequence;

class RoleSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Role::insert([
            ['id' => 1, 'role' => 'admin'],
            ['id' => 2, 'role' => 'employee'],
            ['id' => 3, 'role' => 'visitor'],
        ]);
    }
}
