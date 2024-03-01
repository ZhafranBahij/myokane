<?php

namespace Database\Seeders;

use App\Models\Outcome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outcome::create([
            'user_id' => 1,
            'value' => 10_000,
            'description' => "makan bakso",
        ]);
    }
}
