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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('slug');
            $table->string('dosis');
            $table->string('golongan');
            $table->integer('stok');
            $table->enum('satuan', ['Sirup', 'Kapsul', 'Tablet']);
            $table->unsignedBigInteger('signa_id');
            $table->date('kadaluarsa');
            $table->timestamps();

            $table->foreign('signa_id')->references('id')->on('signas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
