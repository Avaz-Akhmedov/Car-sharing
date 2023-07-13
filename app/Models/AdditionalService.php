<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AdditionalService extends Model
{
    use HasFactory;

    protected $fillable = ["name", "price"];

    public function rates(): BelongsToMany
    {
        return $this->belongsToMany(Rate::class, "rate_additional_service");
    }

}
