<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visitor;
use App\Models\Phone;
use Illuminate\Support\Str;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visitor::factory()
            ->count(5)
            ->create()
            ->each(function ($visitor) {
                $visitor->phones()->create([
                    'phone' => '7' . rand(9000000000, 9999999999),
                ]);
            });
    }
}
