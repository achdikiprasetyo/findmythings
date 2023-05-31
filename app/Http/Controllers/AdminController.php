<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(){
        $barang = DB::table('barang')->get();
        return view('admin.index',['barang' => $barang]);
    }
    public function laporan(){
        $datas = DB::table('laporan')
            ->join('barang', 'laporan.barang_id', '=', 'barang.id_barang')
            ->join('users', 'laporan.user_id', '=', 'users.id')
            ->select('laporan.*', 'barang.nama_barang', 'barang.gambar', 'users.*')
            ->get();

            
            return view('admin.laporan',['datas' => $datas]);
    }
}
