<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coaching_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon_name')->nullable();
            $table->text('short_description')->nullable();
            $table->json('full_details_json')->nullable();
            $table->string('cta_link')->nullable();
            $table->integer('order_weight')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaching_services');
    }
};
