<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga')->cascadeOnDelete();
            $table->foreignId('rt_id')->constrained('rt')->cascadeOnDelete();
            $table->foreignId('kategori_id')->constrained('kategori_pengaduan')->cascadeOnDelete();
            $table->string('judul');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->enum('status', ['menunggu_verifikasi', 'diterima', 'diproses', 'selesai', 'ditolak'])->default('menunggu_verifikasi');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
