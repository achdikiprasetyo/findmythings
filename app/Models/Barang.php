<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';


    protected $fillable = ['id_barang',
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
