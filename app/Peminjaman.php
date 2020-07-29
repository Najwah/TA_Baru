<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['jurusan', 'prodi', 'nama_kegiatan', 'peminjam_id', 'tgl_pengembalian'];

    public function peminjam()
    {
        return $this->belongsTo('App\User', 'peminjam_id');
    }

    public function petugas()
    {
        return $this->belongsTo('App\User', 'petugas_id');
    }
}
