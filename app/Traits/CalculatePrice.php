<?php

namespace App\Traits;

use App\Models\AdditionalService;
use App\Models\Rate;

trait CalculatePrice
{
    protected function calculate(array $data): float|int
    {

        $rate = Rate::query()->where("name", $data["rate"])->first();
        $additionalServiceCost = isset($data["additionalServices"]) ?  $this->getServicePrice($data["additionalServices"]) : 0;


        if ($rate->name == "hourly") {
            return ceil($rate->cost_fixed * $data["minutes"] / 60) + $additionalServiceCost;
        }

        if ($rate->name == "daily") {
            return $rate->cost_fixed * $data["duration"] + $additionalServiceCost;
        }

        $costPerMinute = $rate->cost_per_minute * $data["minutes"];
        $costPerKm = $rate->cost_per_km * $data["km"];

        return $costPerMinute + $costPerKm + $additionalServiceCost;
    }

    private function getServicePrice(array $services): int
    {

        $serviceData = AdditionalService::query()->whereIn("name", $services)->get();

        $total = 0;

        foreach ($serviceData as $service) {
            $total += $service->price;
        }

        return $total;
    }


}