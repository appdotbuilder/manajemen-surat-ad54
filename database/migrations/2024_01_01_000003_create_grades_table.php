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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama golongan (misal: III/a, III/b, IV/a)');
            $table->string('code')->unique()->comment('Kode golongan');
            $table->text('description')->nullable()->comment('Deskripsi golongan');
            $table->decimal('salary_base', 15, 2)->nullable()->comment('Gaji pokok');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Status golongan');
            $table->timestamps();
            
            // Indexes
            $table->index('code');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};