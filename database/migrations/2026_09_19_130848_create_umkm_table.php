<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga')->cascadeOnDelete();
            $table->foreignId('kategori_id')->constrained('kategori_umkm')->cascadeOnDelete();
            $table->string('nama_usaha');
            $table->text('deskripsi');
            $table->text('alamat');
            $table->string('whatsapp', 20);
            $table->string('foto')->nullable();
            $table->enum('status', ['menunggu_verifikasi', 'disetujui', 'ditolak'])->default('menunggu_verifikasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
