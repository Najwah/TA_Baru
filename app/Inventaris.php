<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = "inventaris";
    protected $primaryKey = "id";
    protected $fillable = ['nomor_inventaris', 'tahun_perolehan', 'kondisi', 'tempat', 'habis_pakai','id_barang'];

    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }

    public function sumberDana()
    {
        return $this->belongsTo('App\SumberDana');
    }

    public function peruntukan()
    {
        return $this->morphTo(__FUNCTION__, 'peruntukan_type', 'peruntukan_id');
    }
}
