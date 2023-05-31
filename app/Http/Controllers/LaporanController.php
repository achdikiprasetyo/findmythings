<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function create(string $barang_id){
        $barang= Barang::find($barang_id);
        return view('laporan.create',['barang'=>$barang]);
    }
    public function store(Request $request){
            $storedata['user_nama'] = $request->input('user_nama');
            $storedata['user_kontak'] = $request->input('user_kontak');
            $storedata['deskripsi_laporan'] = $request->input('deskripsi_laporan');
            // Store the uploaded image
            $namaFoto = uniqid().'.'.$request->file('gambar')->extension();
            $request->file('gambar')->storeAs(
                'gambar/laporan', $namaFoto
            );


            $storedata['foto_konfirmasi'] = $namaFoto;
            $storedata['barang_id'] = $request->input('barang_id');
            $storedata['user_id'] = $request->input('user_id');
            Laporan::create($storedata);

            // ganti status
            DB::table('barang')->where('id_barang', $request->input('barang_id'))->update(['status' => 'Ditemukan']);
            return redirect()->route('barang.index')->with('success','Laporan berhasil ditambahkan.');
        
    }
}
