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
        Schema::create('pinjam', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pinjam');
            $table->date('tanggal_pinjam');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('ruang',['GKM LANTAI 4','GKM LANTAI 3','Auditorium G2','Lab Komputer G1','Lapangan Basket','Gedung F2.14','Gedung F3.14']);
            $table->enum('status',['Menunggu Persetujuan','Ditolak','Disetujui','Selesai'])->default('Menunggu Persetujuan');
            $table->date('tanggal_pengajuan');
            $table->string('kontak_peminjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam');
    }
};
