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
        Schema::create('kepegawaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_profile_id')->constrained()->onDelete('cascade');
            $table->string('status_inpassing')->nullable();
            $table->string('nomor_sk_inpassing')->nullable();
            $table->date('tanggal_sk_inpassing')->nullable();
            $table->string('jabatan_fungsional_terakhir')->nullable();
            $table->string('nomor_sk_jabfung')->nullable();
            $table->date('tanggal_sk_jabfung')->nullable();
            $table->string('pangkat_terakhir')->nullable();
            $table->string('nomor_sk_pangkat')->nullable();
            $table->date('tanggal_sk_pangkat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepegawaian');
    }
};
