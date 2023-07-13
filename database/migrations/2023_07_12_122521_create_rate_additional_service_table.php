<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("rate_additional_service", function (Blueprint $table) {
            $table->foreignId("rate_id")->constrained();
            $table->foreignId("additional_service_id")->constrained();
            $table->boolean("is_available")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate_additional_service');
    }
};
