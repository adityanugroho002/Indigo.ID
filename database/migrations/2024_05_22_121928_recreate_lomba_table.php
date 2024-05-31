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
        // Hapus tabel lomba jika sudah ada
        Schema::dropIfExists('lomba');

        // Buat tabel lomba
        Schema::create('lomba', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lomba');
            $table->string('jenis_lomba');
            $table->string('status')->nullable(); // Menambahkan kolom status
            $table->string('link_guidebook')->nullable();
            $table->string('link_pendaftaran')->nullable(); // Menambahkan kolom link pendaftaran
            $table->string('kontak')->nullable();
            $table->string('poster')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('ketentuan')->nullable(); // Menambahkan kolom ketentuan
            $table->string('biaya')->nullable();
            $table->longText('timeline')->nullable();
            $table->dateTime('tanggal_pelaksanaan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tabel lomba
        Schema::dropIfExists('lomba');
    }
};
