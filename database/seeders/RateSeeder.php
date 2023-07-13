<?php

namespace Database\Seeders;

use App\Enums\RateEnum;
use App\Models\Rate;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseRate = Rate::query()->create([
            "name" => RateEnum::BASE->value,
            "cost_per_km" => 10,
            "cost_per_minute" => 3
        ]);


        Rate::query()->create([
            "name" => RateEnum::DAILY->value,
            "cost_fixed" => 1000
        ]);
        Rate::query()->create([
            "name" => RateEnum::HOURLY->value,
            "cost_fixed" => 200
        ]);
        $studentRate = Rate::query()->create([
            "name" => RateEnum::STUDENT->value,
            "cost_per_km" => 4,
            "cost_per_minute" => 1,
            "age_restriction" => 25
        ]);

        $baseRate->additionalServices()->attach([1 => ["is_available" => false]]);
        $studentRate->additionalServices()->attach([2 => ["is_available" => false]]);

    }
}
