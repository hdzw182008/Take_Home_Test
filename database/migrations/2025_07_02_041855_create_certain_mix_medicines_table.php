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
        Schema::create('certain_mix_medicines', function (Blueprint $table) {
            $table->id();
            $table->integer('id_obat'); 
            $table->string('nama_obat');
            $table->string('qty');
            $table->string('signa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certain_mix_medicines');
    }
};
