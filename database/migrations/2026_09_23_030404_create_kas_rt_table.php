<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kas_rt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rt_id')->constrained('rt')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date('tanggal');
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->string('kategori');
            $table->string('keterangan');
            $table->decimal('jumalh', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kas_rt');
    }
};
