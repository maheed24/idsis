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
        Schema::create('ship_propulsions', function (Blueprint $table) {
            $table->id();
            $table->string('engine_make')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('horsepower')->nullable();
            $table->string('no_cyclinder')->nullable();
            $table->string('cycle')->nullable();
            $table->foreignId('status_id');
            $table->foreignId('details_id');
            // $table->string('model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship_propulsions');
    }
};
