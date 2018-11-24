<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // menghubungkan tabel siswa
    protected $table = 'produks';
    // menyimpan data tanpa timestamps(created_at, updated_at, delete_at)
    protected $fillable = ['nama','harga', 'deskripsi', 'noHp', 'gambar'];
}
