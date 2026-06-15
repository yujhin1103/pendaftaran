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
    Schema::create('pendaftarans', function (Blueprint $table) {
        $table->id();

        $table->string('nama_lengkap');
        $table->string('nama_panggilan');
        $table->string('departemen');

        $table->text('alamat_rumah');
        $table->text('tempat_tinggal');

        $table->string('asal_sekolah');
        $table->string('no_hp');
        $table->string('email');

        $table->string('foto')->nullable();
        $table->string('cv')->nullable();
        $table->string('surat_izin')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
