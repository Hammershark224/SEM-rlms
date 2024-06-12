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
        Schema::create('attendance_details', function (Blueprint $table) {
            $table->id("attendance_ID");
            $table->foreignId('student_ID')->constrained('student_details', 'student_ID');
            $table->foreignId('lecturer_ID')->constrained('lecturer_details', 'lecturer_ID');
            $table->foreignId('lab_ID')->constrained('lab_details', 'lab_ID');
            $table->string('attendance_status');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendence_details');
    }
};
