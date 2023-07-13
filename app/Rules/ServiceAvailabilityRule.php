<?php

namespace App\Rules;

use App\Models\AdditionalService;
use App\Models\Rate;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ServiceAvailabilityRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $rate = Rate::query()
            ->where("name", request("rate"))
            ->first();

        $service = AdditionalService::query()
            ->where("name", request("additionalServices"))
            ->first();

        $checkService = $rate
            ->additionalServices()
            ->where("additional_service_id", $service->id)
            ->wherePivot("is_available", false)
            ->exists();

        if ($checkService) {
            $fail("{$service->name} service is not available for {$rate->name} rate");
        }
    }
}
