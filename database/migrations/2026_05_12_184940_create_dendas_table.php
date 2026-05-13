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
        Schema::create('dendas', function (Blueprint $table) {
            $table->id();

            // 🔗 relasi ke peminjaman
            $table->foreignId('peminjaman_id')
                ->constrained('peminjamans')
                ->onDelete('cascade');

            // 💰 jumlah denda (uang)
            $table->integer('jumlah_denda')->default(0);

            // 💳 status pembayaran denda
            $table->enum('status_bayar', ['belum', 'lunas'])->default('belum');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dendas');
    }
};
