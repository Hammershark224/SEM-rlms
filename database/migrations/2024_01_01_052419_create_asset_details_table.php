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
        Schema::create('asset_details', function (Blueprint $table) {
            $table->id("asset_ID");
            $table->string("technician_ID")->references("technician_ID")->on("technician_details");
            $table->string("lab_ID")->references("lab_ID")->on("lab_details");
            $table->string("admin_ID")->references("admin_ID")->on("system_administration_details");
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
