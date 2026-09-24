<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rw_id')->constrained('rw')->cascadeOnDelete();
            $table->string('nama_rt');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rt');
    }
};
