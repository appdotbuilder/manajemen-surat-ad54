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
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id();
            $table->string('disposition_number')->unique()->comment('Nomor disposisi');
            $table->foreignId('incoming_letter_id')->constrained('incoming_letters')->onDelete('cascade');
            $table->foreignId('from_employee_id')->constrained('employees');
            $table->foreignId('to_employee_id')->constrained('employees');
            $table->foreignId('to_department_id')->nullable()->constrained('departments');
            $table->enum('disposition_type', ['untuk_ditindaklanjuti', 'untuk_diketahui', 'untuk_dipelajari', 'untuk_dikoordinasikan'])->comment('Jenis disposisi');
            $table->text('instructions')->nullable()->comment('Instruksi disposisi');
            $table->text('notes')->nullable()->comment('Catatan disposisi');
            $table->date('due_date')->nullable()->comment('Batas waktu penyelesaian');
            $table->enum('priority', ['low', 'normal', 'high', 'urgent'])->default('normal')->comment('Prioritas disposisi');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'returned', 'archived'])->default('pending')->comment('Status disposisi');
            $table->timestamp('completed_at')->nullable()->comment('Waktu penyelesaian');
            $table->text('completion_notes')->nullable()->comment('Catatan penyelesaian');
            $table->timestamps();
            
            // Indexes
            $table->index('disposition_number');
            $table->index('incoming_letter_id');
            $table->index(['from_employee_id', 'status']);
            $table->index(['to_employee_id', 'status']);
            $table->index('due_date');
            $table->index('status');
            $table->index('priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositions');
    }
};