<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRateRequest;
use App\Http\Resources\RateResource;
use App\Models\Rate;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RateController extends Controller
{
    //List of all available rates
    public function index(): AnonymousResourceCollection
    {
        $rates = Rate::all();

        return RateResource::collection($rates);
    }


    //Each rate one by one
    public function show(Rate $rate): RateResource
    {
        return RateResource::make($rate);
    }


}
