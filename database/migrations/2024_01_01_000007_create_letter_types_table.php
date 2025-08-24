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
        Schema::create('letter_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama sifat surat');
            $table->string('code')->unique()->comment('Kode sifat');
            $table->text('description')->nullable()->comment('Deskripsi sifat surat');
            $table->enum('priority', ['low', 'normal', 'high', 'urgent'])->default('normal')->comment('Tingkat prioritas');
            $table->string('color_code')->default('#6B7280')->comment('Kode warna untuk UI');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Status sifat surat');
            $table->timestamps();
            
            // Indexes
            $table->index('code');
            $table->index('priority');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_types');
    }
};