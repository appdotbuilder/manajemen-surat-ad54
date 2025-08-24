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
        Schema::create('disposition_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disposition_id')->constrained('dispositions')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees');
            $table->string('action')->comment('Jenis aksi yang dilakukan');
            $table->string('previous_status')->nullable()->comment('Status sebelumnya');
            $table->string('new_status')->comment('Status baru');
            $table->text('notes')->nullable()->comment('Catatan aksi');
            $table->json('metadata')->nullable()->comment('Data tambahan dalam format JSON');
            $table->timestamps();
            
            // Indexes
            $table->index('disposition_id');
            $table->index('employee_id');
            $table->index('action');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposition_histories');
    }
};