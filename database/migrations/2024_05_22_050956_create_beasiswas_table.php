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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('provider')->nullable();
            $table->string('status')->nullable();
            $table->text('description')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('country')->nullable();
            $table->text('eligibility_criteria')->nullable();
            $table->string('education_level')->nullable();
            $table->text('benefits')->nullable();
            $table->text('selection_process')->nullable();
            $table->text('document_requirements')->nullable();
            $table->text('language_requirements')->nullable();
            $table->text('application_method')->nullable();
            $table->text('guide_book')->nullable();
            $table->string('official_website')->nullable();
            $table->string('bulan')->nullable();
            $table->string('poster')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
