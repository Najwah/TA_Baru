<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barangs";
    protected $fillable = ['kode', 'nama', 'merk', 'tipe', 'spesifikasi', 'satuan', 'foto'];
    protected $primaryKey = "id";

    public function inventaris()
    {
        return $this->hasmany('App\inventaris');
    }

    public function keranjang()
    {
        return $this->belongsTo('App\Keranjang');
    }
}
