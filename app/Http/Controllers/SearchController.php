<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    public function index(Request $request){
        
        
        $query = $request->input('query');
        $tanggal = $request->input('tanggal');
        $kategori = $request->input('kategori');
        
        $results = Barang::query();

        if ($query != "") {
            $results->where(function ($q) use ($query) {
                $q->where('nama_barang', 'like', '%' . $query . '%');
                //   ->orWhere('lokasi', 'like', '%' . $query . '%')
                //   ->orWhere('deskripsi', 'like', '%' . $query . '%');
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


// $query = DB::table('barang');
    
        // $category = $request->query('kategori');
        // $date = $request->query('tanggal');
    
        // if ($category && $date) {
        //     $query->where('kategori', $category)
        //         ->whereDate('tanggal', Carbon::parse($date)->format('Y-m-d'));
        // } elseif ($category) {
        //     $query->where('kategori', $category);
        // } elseif ($date) {
        //     $query->whereDate('tanggal', Carbon::parse($date)->format('Y-m-d'));
        // }
    
        // $barang = $query->get();

        // dd($barang);
        // return view('barang.index', ['barang' => $barang]);