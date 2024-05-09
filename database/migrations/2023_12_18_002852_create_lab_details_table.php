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
        Schema::create('lab_details', function (Blueprint $table) {
            $table->id("lab_ID");
            $table->string('lab_name');
            $table->string('lab_location');
            $table->string('lab_type');
            $table->string('lab_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_details');
    }
};
