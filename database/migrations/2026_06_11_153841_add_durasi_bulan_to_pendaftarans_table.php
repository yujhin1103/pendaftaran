<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pendaftarans', function ($table) {
        $table->integer('durasi_bulan')->nullable();
    });
}

public function down()
{
    Schema::table('pendaftarans', function ($table) {
        $table->dropColumn('durasi_bulan');
    });
}
};
