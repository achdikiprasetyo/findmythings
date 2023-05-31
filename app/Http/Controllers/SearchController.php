<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    public function search(Request $request){
        
        
        $query = $request->input('query');
        $tanggal = $request->input('tanggal');
        $kategori = $request->input('kategori');
        
        $results = Barang::query();

        if ($query != "") {
            $results->where(function ($q) use ($query) {
                $q->where('nama_barang', 'like', '%' . $query . '%')
                  ->orWhere('lokasi', 'like', '%' . $query . '%')
                  ->orWhere('deskripsi', 'like', '%' . $query . '%');
            });
        }

        if ($tanggal != "") {
            $results->whereDate('tanggal', $tanggal);
        }

        if ($kategori != "") {
            $results->where('kategori', $kategori);
        }

        $results = $results->get();

        return view('barang.index', ['barang' => $results]);
    }
}


