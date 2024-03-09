<?php

namespace Database\Seeders;

use App\Models\Income;
use Database\Factories\IncomeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Income::factory()
                ->count(10000)
                ->state(new Sequence(
                    ['user_id' => 1],
                    ['user_id' => 2],
                    ['user_id' => 3],
                ))
                ->create();
    }
}
