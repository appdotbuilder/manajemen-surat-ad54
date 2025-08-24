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
        Schema::create('letter_numbers', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['incoming', 'outgoing'])->comment('Tipe surat');
            $table->foreignId('category_id')->constrained('letter_categories')->onDelete('cascade');
            $table->string('prefix')->comment('Prefix nomor surat');
            $table->string('format')->comment('Format penomoran (misal: {prefix}/{number}/{month}/{year})');
            $table->integer('current_number')->default(0)->comment('Nomor terakhir yang digunakan');
            $table->integer('year')->comment('Tahun berlaku');
            $table->boolean('reset_yearly')->default(true)->comment('Reset nomor setiap tahun');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Status penomoran');
            $table->timestamps();
            
            // Indexes
            $table->index(['type', 'category_id', 'year']);
            $table->index('year');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_numbers');
    }
};