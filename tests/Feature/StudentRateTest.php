<?php

namespace Tests\Feature;

use Tests\TestCase;

class StudentRateTest extends TestCase
{
    public function test_student_rate_calculation_without_additional_services()
    {
        $data = [
            "rate" => "student",
            "driverAge" => 19,
            "minutes" => 30,
            "km" => 2
        ];


        $this->postJson(route("calculate.price"), $data)
            ->assertOk()
            ->assertJson(["result" => 38]);
    }

    public function test_student_rate_calculation_with_additional_services()
    {
        $data = [
            "rate" => "student",
            "driverAge" => 19,
            "minutes" => 30,
            "km" => 2,
            "additionalServices" => [
                "wifi"
            ]
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertOk()
            ->assertJson(["result" => 53]);
    }

    public function test_driver_age_validation_rule()
    {
        $data = [
            "rate" => "student",
            "driverAge" => 27,
            "minutes" => 30,
            "km" => 2
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor("driverAge");
    }

    public function test_unavailable_service_rule()
    {
        $data = [
            "rate" => "student",
            "driverAge" => 20,
            "minutes" => 30,
            "km" => 2,
            "additionalServices" => [
                "additional driver"
            ]
        ];

        $this->postJson(route("calculate.price"), $data)
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor("additionalServices.0");
    }

}
