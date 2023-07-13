<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateCarPriceRequest;
use App\Traits\CalculatePrice;
use Illuminate\Http\JsonResponse;

class CalculatePriceController extends Controller
{
    use CalculatePrice;

    public function __invoke(CalculateCarPriceRequest $request): JsonResponse
    {


        $total = $this->calculate(
            $request->validated()
        );

        return response()->json([
            "result" => $total
        ]);
    }
}
