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
        Schema::table('penilaians', function (Blueprint $table) {
            $table->string('tanda_tangan_manager')->nullable();
            $table->string('nama_penanda_tangan_manager')->nullable();
            $table->string('jabatan_manager')->nullable();
            $table->string('tanda_tangan_hrd')->nullable();
            $table->string('nama_penanda_tangan_hrd')->nullable();
            $table->string('jabatan_hrd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropColumn([
                'tanda_tangan_manager',
                'nama_penanda_tangan_manager',
                'jabatan_manager',
                'tanda_tangan_hrd',
                'nama_penanda_tangan_hrd',
                'jabatan_hrd'
            ]);
        });
    }
};
