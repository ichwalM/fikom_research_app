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
        Schema::create('dosen_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nidn_nip')->unique()->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->string('npwp')->nullable(); 
            $table->string('nama_wajib_pajak')->nullable(); 
            $table->string('sinta_id')->nullable(); 
            $table->string('google_scholar_id')->nullable();
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_profiles');
    }
};
