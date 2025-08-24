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
        Schema::create('outgoing_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_number')->unique()->comment('Nomor surat keluar');
            $table->string('subject')->comment('Perihal surat');
            $table->string('recipient')->comment('Penerima surat');
            $table->string('recipient_address')->nullable()->comment('Alamat penerima');
            $table->date('letter_date')->comment('Tanggal surat');
            $table->date('sent_date')->nullable()->comment('Tanggal pengiriman');
            $table->foreignId('category_id')->constrained('letter_categories');
            $table->foreignId('letter_type_id')->constrained('letter_types');
            $table->foreignId('created_by')->constrained('employees');
            $table->foreignId('signed_by')->nullable()->constrained('employees');
            $table->text('content')->nullable()->comment('Isi surat');
            $table->text('notes')->nullable()->comment('Catatan tambahan');
            $table->string('file_path')->nullable()->comment('Path file surat');
            $table->string('file_name')->nullable()->comment('Nama file asli');
            $table->bigInteger('file_size')->nullable()->comment('Ukuran file dalam bytes');
            $table->enum('status', ['draft', 'pending_approval', 'approved', 'sent', 'archived'])->default('draft')->comment('Status surat');
            $table->timestamps();
            
            // Indexes
            $table->index('letter_number');
            $table->index('letter_date');
            $table->index('sent_date');
            $table->index(['category_id', 'letter_type_id']);
            $table->index('status');
            $table->index(['created_by', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_letters');
    }
};