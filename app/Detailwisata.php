<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailwisata extends Model
{
    protected $fillable = [
        'kota/kabupaten',
        'informasi'
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'detailwisata_id');
    }
}
