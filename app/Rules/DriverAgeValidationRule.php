<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class DriverAgeValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $rate = request("rate");
        $driverAge = request("driverAge");


        if ($rate == "student" and $driverAge > 25) {
            $fail("For $rate rate driver age must be younger than 25");
        }
    }
}
