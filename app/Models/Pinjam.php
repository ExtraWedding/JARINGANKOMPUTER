<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjam';
    protected $fillable = ['nama_pinjam','tanggal_pinjam','jam_mulai','jam_selesai','ruang','status','tanggal_pengajuan','kontak_peminjam'];
}
