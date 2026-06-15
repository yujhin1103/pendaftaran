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
    Schema::create('penilaians', function (Blueprint $table) {

        $table->id();

        $table->unsignedBigInteger('pendaftaran_id');

        $table->integer('grooming');
        $table->integer('motivation');
        $table->integer('responsibility');
        $table->integer('cooperativeness');
        $table->integer('attendance');

        $table->integer('job_knowledge');
        $table->integer('quality_of_work');
        $table->integer('job_speed');
        $table->integer('initiative');
        $table->integer('improvement_achieved');

        $table->integer('total_score');

        $table->string('rating');

        $table->timestamps();

        $table->foreign('pendaftaran_id')
            ->references('id')
            ->on('pendaftarans')
            ->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
