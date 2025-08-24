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
        Schema::create('incoming_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_number')->comment('Nomor surat dari pengirim');
            $table->string('internal_number')->unique()->comment('Nomor registrasi internal');
            $table->string('subject')->comment('Perihal surat');
            $table->string('sender')->comment('Pengirim surat');
            $table->string('sender_address')->nullable()->comment('Alamat pengirim');
            $table->date('letter_date')->comment('Tanggal surat');
            $table->date('received_date')->comment('Tanggal diterima');
            $table->foreignId('category_id')->constrained('letter_categories');
            $table->foreignId('letter_type_id')->constrained('letter_types');
            $table->foreignId('received_by')->constrained('employees');
            $table->text('notes')->nullable()->comment('Catatan tambahan');
            $table->string('file_path')->nullable()->comment('Path file surat');
            $table->string('file_name')->nullable()->comment('Nama file asli');
            $table->bigInteger('file_size')->nullable()->comment('Ukuran file dalam bytes');
            $table->enum('status', ['received', 'processed', 'archived'])->default('received')->comment('Status surat');
            $table->timestamps();
            
            // Indexes
            $table->index('letter_number');
            $table->index('internal_number');
            $table->index('letter_date');
            $table->index('received_date');
            $table->index(['category_id', 'letter_type_id']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_letters');
    }
};