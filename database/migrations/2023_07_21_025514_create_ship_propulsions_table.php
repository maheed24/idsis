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
            $table->string('engine_make');
            $table->string('serial_no');
            $table->string('horsepower');
            $table->string('no_cyclinder');
            $table->string('cycle');
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
