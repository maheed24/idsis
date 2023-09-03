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
        Schema::create('certificate_licenses', function (Blueprint $table) {
            $table->id('cert_id');
            $table->integer('or_no');
            $table->date('or_date');
            $table->string('cert_no');
            $table->string('sec_no');
            $table->foreignId('cert_type_id');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('details_id');
            $table->decimal('amount');
            $table->string('qr_code')->nullable();
            $table->date('date_issued');
            $table->string('validity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_licenses');
    }
};
