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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama departemen/unit kerja');
            $table->string('code')->unique()->comment('Kode departemen');
            $table->text('description')->nullable()->comment('Deskripsi departemen');
            $table->foreignId('parent_id')->nullable()->constrained('departments')->onDelete('cascade');
            $table->foreignId('head_employee_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Status departemen');
            $table->timestamps();
            
            // Indexes
            $table->index('code');
            $table->index('parent_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};