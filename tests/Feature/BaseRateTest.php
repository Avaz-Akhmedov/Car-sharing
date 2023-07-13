<?php

namespace Tests\Feature;

use Tests\TestCase;

class BaseRateTest extends TestCase
{


    public function test_base_rate_calculation_without_additional_services()
    {
        $data = [
            "rate" => "base",
            "driverAge" => 19,
            "minutes" => 30,
            "km" => 2
        ];


        $this->postJson(route("calculate.price"), $data)
            ->assertOk()
            ->assertJson(["result" => 110]);
    }

    public function test_base_rate_calculation_with_additional_services()
    {
        $data = [
            "rate" => "base",
            "driverAge" => 19,
            "minutes" => 30,
            "km" => 2,
            "additionalServices" => [
                "additional driver"
            ]
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertOk()
            ->assertJson(["result" => 210]);
    }

    public function test_validation_unavailable_service_selected()
    {
        $data = [
            "rate" => "base",
            "driverAge" => 19,
            "minutes" => 30,
            "km" => 2,
            "additionalServices" => [
                "wifi",
                "additional driver"
            ]
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor("additionalServices.0");
    }




}

