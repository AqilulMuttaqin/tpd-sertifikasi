<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Undangan', 'keterangan' => 'Surat undangan resmi'],
            ['nama_kategori' => 'Pengumuman', 'keterangan' => 'Surat pengumuman resmi'],
            ['nama_kategori' => 'Nota Dinas', 'keterangan' => 'Surat nota dinas resmi'],
            ['nama_kategori' => 'Pemberitahuan', 'keterangan' => 'Surat pemberitahuan resmi'],
        ];

        DB::table('tb_kategori')->insert($data);
    }
}
