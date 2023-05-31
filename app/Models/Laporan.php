<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'user_nama',
        'user_kontak',
        'deskripsi_laporan',
        'foto_konfirmasi',
        'barang_id',
        'user_id'
    ];
}
