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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['administrator', 'user'])->default('user')->after('email_verified_at');
            $table->foreignId('employee_id')->nullable()->after('role')->constrained('employees')->onDelete('set null');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('employee_id');
            
            // Indexes
            $table->index('role');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn(['role', 'employee_id', 'status']);
        });
    }
};