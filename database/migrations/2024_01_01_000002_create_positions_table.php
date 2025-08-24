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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama jabatan');
            $table->string('code')->unique()->comment('Kode jabatan');
            $table->text('description')->nullable()->comment('Deskripsi jabatan');
            $table->integer('level')->comment('Level jabatan (1=tinggi, semakin besar semakin rendah)');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Status jabatan');
            $table->timestamps();
            
            // Indexes
            $table->index('code');
            $table->index('level');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};