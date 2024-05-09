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
        Schema::create('system_administration_details', function (Blueprint $table) {
            $table->id("admin_ID");
            $table->foreignId("user_ID")->references("user_ID")->on("Users");
            $table->string('staff_ID');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_administration_details');
    }
};
