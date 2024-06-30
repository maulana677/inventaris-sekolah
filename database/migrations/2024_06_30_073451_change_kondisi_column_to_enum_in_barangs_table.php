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
        Schema::table('barangs', function (Blueprint $table) {
            // Ubah kolom kondisi menjadi enum dengan nilai 'baik' dan 'rusak'
            $table->enum('kondisi', ['baik', 'rusak'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            // Ubah kembali kolom kondisi menjadi string
            $table->string('kondisi', 50)->change();
        });
    }
};
