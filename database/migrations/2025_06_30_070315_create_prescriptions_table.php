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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_medicine');
            $table->string('items');
            $table->string('qty');
            $table->unsignedBigInteger('signa_id');
            $table->timestamps(); 

            // $table->foreign('medicine_id')->references('id')->on('medicines');
            // $table->foreign('mixedmedicine_id')->references('id')->on('mixed_medicines');
            // $table->foreign('signa_id')->references('id')->on('signas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
