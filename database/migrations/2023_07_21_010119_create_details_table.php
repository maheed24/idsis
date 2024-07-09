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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('company_name');
            $table->string('business_address');
            $table->string('ship_name');
            $table->string('official_no');
            $table->string('imo_no')->nullable();
            $table->string('former_ship_name')->nullable();
            $table->foreignId('ship_type_id')->nullable();
            $table->string('former_owner')->nullable();
            $table->foreignId('trading_area_id')->nullable();
            $table->string('builder');
            $table->string('place_built');
            $table->year('year_built');
            $table->string('modified_by')->nullable();
            $table->string('place_modified')->nullable();
            $table->string('year_modified')->nullable();
            $table->string('length');
            $table->string('gross_tonnage');
            $table->string('no_screw');
            $table->string('no_masts');
            $table->string('breadth');
            $table->string('net_tonnage');
            $table->string('deadweight')->nullable();
            $table->string('no_decks');
            $table->string('depth');
            $table->foreignId('hull_material_id')->nullable();
            $table->foreignId('stem_type_id')->nullable();
            $table->foreignId('stern_type_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('ship_classification_id')->nullable();
            $table->foreignId('rig_type_id')->nullable();
            $table->foreignId('operation_id')->nullable();
            $table->string('call_sign')->nullable();
            $table->string('nationality')->nullable();
            $table->string('body_no')->nullable();
            $table->string('homeport')->nullable();
            $table->foreignId('acquisition_type_id')->nullable();
            $table->string('change_homeport')->nullable();
            $table->foreignId('image_id')->nullable();
            $table->string('status_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
