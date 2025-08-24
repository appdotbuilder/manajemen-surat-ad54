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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique()->comment('Nomor Induk Pegawai');
            $table->string('name')->comment('Nama lengkap pegawai');
            $table->string('email')->unique()->nullable()->comment('Email pegawai');
            $table->string('phone')->nullable()->comment('Nomor telepon');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Status pegawai');
            $table->text('address')->nullable()->comment('Alamat pegawai');
            $table->date('birth_date')->nullable()->comment('Tanggal lahir');
            $table->enum('gender', ['male', 'female'])->comment('Jenis kelamin');
            $table->timestamps();
            
            // Indexes
            $table->index('nip');
            $table->index('name');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};