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
        Schema::create('pengembalians', function (Blueprint $table) {

            $table->id();

            //  relasi ke tabel peminjamans
            $table->foreignId('peminjaman_id')
                ->constrained('peminjamans')
                ->onDelete('cascade');

            //  tanggal buku dikembalikan
            $table->date('tanggal_kembali');

            //  jumlah hari terlambat
            $table->integer('terlambat')->default(0);

            //  total denda
            $table->integer('denda')->default(0);

            //  status pembayaran denda
            $table->enum('status_denda', [
                'lunas',
                'belum_lunas'
            ])->default('lunas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
