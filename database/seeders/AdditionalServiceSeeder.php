<?php

namespace Database\Seeders;

use App\Models\AdditionalService;
use Illuminate\Database\Seeder;

class AdditionalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdditionalService::query()->create([
            "name" => "wifi",
            "price" => 15,

        ]);
        AdditionalService::query()->create([
            "name" => "additional driver",
            "price" => 100,
        ]);
    }
}
