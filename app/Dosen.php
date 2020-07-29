<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nama', 'jurusan', 'nidn'];

    public function peruntukan()
    {
        return $this->hasOne('App\Peruntukan');
    }
}
