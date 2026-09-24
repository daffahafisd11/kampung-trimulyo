<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_bendahara')->default(false)->after('role');

            $table->foreignId('rt_id')->nullable()->after('is_bendahara')->constrained('rt')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['rt_id']);
            $table->dropColumn(['is_bandahara', 'rt_id']);
        });
    }
};
