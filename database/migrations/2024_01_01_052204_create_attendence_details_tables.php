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
        Schema::create('attendence_details_tables', function (Blueprint $table) {
            $table->id();
            $table->string("student_ID")->references("student_ID")->on("student_details");
            $table->string("lecturer_ID")->references("lecturer_ID")->on("lecturer_details");
            $table->string("lab_ID")->references("lab_ID")->on("lab_details");
            $table->string('attendance_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendence_details_tables');
    }
};
