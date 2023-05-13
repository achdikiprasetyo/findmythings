<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = ['id',
        'nama_barang',
        'deskripsi',
        'kontak',
        'lokasi',
        'gambar',
        'kategori',
        'status',
        'tanggal'
        ];
}
