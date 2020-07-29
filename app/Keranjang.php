<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = "peminjaman_keranjang";
    protected $primaryKey = "id_k";
    protected $fillable = ['id_barang', 'no_inventaris', 'jumlah', 'ket'];

    public function barang()
    {
        return $this->belongsTo('App\Barang','id_barang');
    }
}
