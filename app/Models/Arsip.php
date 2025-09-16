<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'tb_arsip';

    protected $fillable = [
        'no_surat',
        'judul_surat',
        'file_surat',
        'kategori_id',
        'waktu_upload',
    ];

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
