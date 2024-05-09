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
        Schema::create('booking_details_tables', function (Blueprint $table) {
            $table->id("booking_ID");
            $table->string("student_ID")->references("student_ID")->on("student_details");
            $table->string("lecturer_ID")->references("lecturer_ID")->on("lecturer_details");
            $table->string("admin_ID")->references("admin_ID")->on("system_administration_details");
            $table->string("lab_ID")->references("lab_ID")->on("lab_details");
            $table->text('booking_reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details_tables');
    }
};
