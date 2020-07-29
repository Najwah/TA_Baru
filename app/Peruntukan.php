<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peruntukan extends Model
{
    protected $fillable = ['nama','kode'];

    public function lab()
    {
        return $this->belongsTo('App\Lab');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }
}
