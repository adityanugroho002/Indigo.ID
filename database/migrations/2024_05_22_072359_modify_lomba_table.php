<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lomba', function (Blueprint $table) {
            if (!Schema::hasColumn('lomba', 'jenis_lomba')) {
                $table->string('jenis_lomba')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'status')) {
                $table->string('status')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'timeline')) {
                $table->string('timeline')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'ketentuan')) {
                $table->text('ketentuan')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'biaya')) {
                $table->string('biaya')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'link_pendaftaran')) {
                $table->string('link_pendaftaran')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'link_guidebook')) {
                $table->string('link_guidebook')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'kontak')) {
                $table->string('kontak')->nullable();
            }
            if (!Schema::hasColumn('lomba', 'poster')) {
                $table->string('poster')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('lomba', function (Blueprint $table) {
            if (Schema::hasColumn('lomba', 'jenis_lomba')) {
                $table->dropColumn('jenis_lomba');
            }
            if (Schema::hasColumn('lomba', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('lomba', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
            if (Schema::hasColumn('lomba', 'timeline')) {
                $table->dropColumn('timeline');
            }
            if (Schema::hasColumn('lomba', 'ketentuan')) {
                $table->dropColumn('ketentuan');
            }
            if (Schema::hasColumn('lomba', 'biaya')) {
                $table->dropColumn('biaya');
            }
            if (Schema::hasColumn('lomba', 'link_pendaftaran')) {
                $table->dropColumn('link_pendaftaran');
            }
            if (Schema::hasColumn('lomba', 'link_guidebook')) {
                $table->dropColumn('link_guidebook');
            }
            if (Schema::hasColumn('lomba', 'kontak')) {
                $table->dropColumn('kontak');
            }
            if (Schema::hasColumn('lomba', 'poster')) {
                $table->dropColumn('poster');
            }
        });
    }
};