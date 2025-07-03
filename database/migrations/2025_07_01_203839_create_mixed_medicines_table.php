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
        Schema::create('mixed_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->unsignedBigInteger('obat_id');
            $table->integer('qty');
            $table->unsignedBigInteger('signa_id');
            $table->timestamps();

            $table->foreign('signa_id')->references('id')->on('signas');
            // $table->foreign('obat_id')->references('id')->on('medicines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mixed_medicines');
    }
};
