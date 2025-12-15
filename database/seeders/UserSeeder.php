<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\User;
use App\Models\Phone;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()
            ->count(10)
            ->state(new Sequence(
                ['role_id' => 2],
                ['role_id' => 3]
            ))
            ->has(Phone::factory())
            ->create();
    }
}
