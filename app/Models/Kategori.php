<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tb_kategori';

    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public function arsip()
    {
        return $this->hasMany(Arsip::class, 'kategori_id');
    }
}
