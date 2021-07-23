<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $fillable = [
        'nama_wisata',
        'lokasi',
        'jenis_wisata'
    ];

    public function detailwisata()
    {
        return $this->belongsTo(Detailwisata::class, 'detailwisata_id');
    }
}
