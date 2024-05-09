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
        Schema::create('asset_details_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technician_details_technician_ID');
            $table->foreignId('lab_details_lab_ID');
            $table->foreignId('system_administration_details_admin_ID');
            $table->string('asset_name');
            $table->string('asset_status');
            $table->text('asset_description');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_details_tables');
    }
};
