<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = ['nama'];

    public function peruntukan()
    {
        return $this->hasOne('App\Peruntukan');
    }
}
