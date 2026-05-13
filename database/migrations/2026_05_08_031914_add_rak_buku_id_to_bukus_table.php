<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bukus', function (Blueprint $table) {

            $table->foreignId('rak_buku_id')
                ->after('penerbit_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('bukus', function (Blueprint $table) {

            $table->dropForeign(['rak_buku_id']);
            $table->dropColumn('rak_buku_id');
        });
    }
};
