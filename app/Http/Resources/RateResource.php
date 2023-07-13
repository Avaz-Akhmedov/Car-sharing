<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'cost_per_km' => $this->cost_per_km,
            'cost_per_minute' => $this->cost_per_minute,
            'cost_fixed' => $this->cost_fixed,
        ];

        if ($this->name == "student") {
            $data['age_restriction'] = 'Drivers up to 25 years old only';
        }

        if (!is_null($this->cost_fixed)) {
            $data['cost_fixed'] = "$this->cost_fixed $this->name";
        }
        if (is_null($this->age_restriction)) {
            $data['age_restriction'] = "Available for everyone";
        }

        return $data;
    }
}
