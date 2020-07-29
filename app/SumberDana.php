<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    protected $table = "sumber_danas";
    protected $primaryKey = "id";
    protected $fillable = ['nama'];

    public function inventaris()
    {
        return $this->belongsTo('App\Inventaris', 'id');
    }
}
