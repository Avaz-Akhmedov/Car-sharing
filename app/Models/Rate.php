<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rate extends Model
{
    use HasFactory;

    public function additionalServices(): BelongsToMany
    {
        return $this->belongsToMany(AdditionalService::class, "rate_additional_service");
    }
}
