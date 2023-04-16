<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DB::table('items')->get();
        return view('items.index',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $namaGambar = uniqid().'.'.$request->file('gambar')->extension();
        $request->merge(['gambar' => $namaGambar]);
        $request->merge(['tanggal_post' => now()]);
        $request->file('gambar')->storeAs(
            'gambar', $namaGambar
        );

        Item::create($request->post());
        return redirect()->route('items.index')->with('success','Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $item= DB::table('items')->find($id);
        return view('items.detail',['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        return view('items.edit', ['item' => $item]);
    }
    
    public function update(Request $request, string $id)
    {   
            $validatedData = $request->validate([
                'nama_barang' => 'required',
                'kategori' => 'required',
                'deskripsi' => 'required',
                'lokasi' => 'required',
                'kontak' => 'required',
                'tanggal' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $item = Item::find($id);
        
            // Update gambar jika ada gambar baru yang diupload
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($item->gambar != null) {
                    Storage::delete('gambar/' . $item->gambar);
                }
                // Simpan gambar baru
                $namaGambar = uniqid() . '.' . $request->file('gambar')->extension();
                $request->file('gambar')->storeAs('gambar', $namaGambar);
                $item->gambar = $namaGambar;
            }
        
            // Update data barang
            $item->nama_barang = $validatedData['nama_barang'];
            $item->kategori = $validatedData['kategori'];
            $item->deskripsi = $validatedData['deskripsi'];
            $item->lokasi = $validatedData['lokasi'];
            $item->kontak = $validatedData['kontak'];
            $item->tanggal = $validatedData['tanggal'];
            $item->save();
        
            return redirect()->route('items.index')->with('success', 'Barang berhasil diupdate.');
        }
        
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        $item= DB::table('items')->find($id);
        $delete = DB::table('items')->where('id','=',$id)->delete();
        $delete;
        Storage::delete('gambar/'.$item->gambar);
        return redirect()->route('items.index')->with('success','Barang Berhasil dihapus.');
    }
}
