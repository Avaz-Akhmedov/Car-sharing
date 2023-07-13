<?php

namespace Tests\Feature;

use Tests\TestCase;

class CostFixedRatesTest extends TestCase
{
    public function test_daily_rate_calculation_without_additional_services()
    {
        $data = [
            "rate" => "daily",
            "driverAge" => 19,
            "duration" => 2
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertOk()
            ->assertJson(["result" => 2000]);
    }

    public function test_daily_rate_calculation_with_additional_services()
    {
        $data = [
            "rate" => "daily",
            "driverAge" => 19,
            "duration" => 2,
            "additionalServices" => [
                "wifi",
                "additional driver"
            ]
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertOk()
            ->assertJson(["result" => 2115]);
    }


    public function test_duration_required_rule()
    {
        $data = [
            "rate" => "daily",
            "driverAge" => 19,
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor("duration");
    }

    public function test_hourly_rate_calculation_without_additional_services()
    {
        $data = [
            "rate" => "hourly",
            "driverAge" => 19,
            "minutes" => 20,
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertOk()
            ->assertJson(["result" => 67]);
    }

    public function test_minutes_required_rule()
    {
        $data = [
            "rate" => "hourly",
            "driverAge" => 19,
            "minutes" => "",
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertUnprocessable()
        ->assertJsonValidationErrorFor("minutes");

    }


}
