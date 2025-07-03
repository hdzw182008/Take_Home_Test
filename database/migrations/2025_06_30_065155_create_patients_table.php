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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('slug');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->date('tanggal_lahir');
            $table->string('kontak');
            $table->enum('usia', ['Anak-anak', 'Dewasa', 'Lansia']);
            $table->enum('golongan_darah', ['None','A', 'B', 'O', 'AB']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
