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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->string('nama_publikasi'); // Nama Jurnal atau Proceeding
            $table->year('tahun');
            $table->enum('jenis', ['Internasional', 'Nasional']);
            $table->string('url_doi')->nullable();
            $table->string('file_path')->nullable();
            $table->string('kontribusi')->nullable(); // Contoh: 'First Author', 'Contributor'
            $table->string('pemeringkatan')->nullable(); // Contoh: 'Scopus Q1', 'Sinta 2'
            $table->integer('jumlah_sitasi')->nullable();
            $table->boolean('keterlibatan_mahasiswa')->nullable()->default(false);
            $table->string('nama_mahasiswa')->nullable();
            $table->boolean('kesesuaian_roadmap')->default(false);
            $table->boolean('kesesuaian_topik_infokom')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi');
    }
};
