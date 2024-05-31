<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lomba', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lomba');
            $table->string('jenis_lomba');
            $table->string('link_guidebook');
            $table->string('kontak');
            $table->string('poster');
            $table->text('deskripsi');
            $table->text('biaya'); // Baris kode yang ditambahkan
            $table->text('timeline'); // Baris kode yang ditambahkan
            $table->dateTime('tanggal_pelaksanaan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lomba');
    }
};
