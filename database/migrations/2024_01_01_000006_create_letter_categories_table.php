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
        Schema::create('letter_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama kategori surat');
            $table->string('code')->unique()->comment('Kode kategori');
            $table->text('description')->nullable()->comment('Deskripsi kategori');
            $table->enum('type', ['incoming', 'outgoing', 'both'])->default('both')->comment('Tipe surat yang berlaku');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Status kategori');
            $table->timestamps();
            
            // Indexes
            $table->index('code');
            $table->index('type');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_categories');
    }
};