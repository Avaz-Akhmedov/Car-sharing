<?php

namespace App\Enums;

enum RateEnum: string
{
    case BASE = "base";
    case DAILY = "daily";
    case HOURLY = "hourly";
    case STUDENT = "student";

    public static function values(): array
    {
        return array_column(self::cases(), "value");
    }
}
