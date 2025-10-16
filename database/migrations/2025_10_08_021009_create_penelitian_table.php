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
        Schema::create('penelitian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('skema_penelitian_id')->nullable()->constrained('skema_penelitian')->onDelete('set null');
            $table->string('judul');
            $table->string('status_peneliti')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->decimal('jumlah_dana', 15, 2)->nullable();
            $table->year('tahun');
            $table->boolean('keterlibatan_mahasiswa')->nullable()->default(false);
            $table->string('nama_mahasiswa')->nullable();
            $table->boolean('kesesuaian_roadmap')->default(false);
            $table->boolean('kesesuaian_topik_infokom')->default(false);
            $table->boolean('mendapatkan_hki')->default(false);
            $table->string('link_kontrak_penelitian')->nullable();
            $table->string('matakuliah')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitian');
    }
};
