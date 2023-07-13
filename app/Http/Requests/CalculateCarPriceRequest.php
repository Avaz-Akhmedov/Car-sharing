<?php

namespace App\Http\Requests;

use App\Rules\DriverAgeValidationRule;
use App\Rules\ServiceAvailabilityRule;
use Illuminate\Foundation\Http\FormRequest;

class CalculateCarPriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "rate" => ["required", "exists:rates,name", "string"],
            "minutes" => ["required_if:rate,base,student,hourly", "numeric", "min:1"],
            "km" => ["required_if:rate,base,student", "numeric", "min:0"],
            "duration" => ["required_if:rate,daily", "numeric", "min:1"],
            "driverAge" => ["required", "numeric", new DriverAgeValidationRule(), "min:18"],

            "additionalServices" => ["nullable", "array"],
            "additionalServices.*" => ["required", "string", "exists:additional_services,name", new ServiceAvailabilityRule()]
        ];
    }


}
