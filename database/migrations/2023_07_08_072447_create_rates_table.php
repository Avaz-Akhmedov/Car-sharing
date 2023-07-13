<?php

use App\Enums\RateEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->enum("name", RateEnum::values());

            $table->float("cost_per_minute")->nullable();
            $table->float("cost_per_km")->nullable();
            $table->float("cost_fixed")->nullable();

            $table->integer("age_restriction")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
