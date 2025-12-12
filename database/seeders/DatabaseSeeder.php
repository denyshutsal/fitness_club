<?php

namespace Database\Seeders;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $user = User::factory()
            ->count(10)
            ->state(new Sequence(
                ['role' => 'visitor'],
                ['role' => 'employee']
            ))
            ->has(Phone::factory())
            ->create();
    }
}
