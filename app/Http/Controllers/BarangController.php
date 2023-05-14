<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang;

class BarangController extends Controller
{
    //
    public function index()
    {
        $barang = DB::table('barang')->get();
        return view('barang.index',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
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

        Barang::create($request->post());
        return redirect()->route('barang.index')->with('success','Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_barang)
    {
        $barang= Barang::find($id_barang);
        return view('barang.detail',['barang'=>$barang]);
    }
    
    
  /**    public function userPosts()
  *  {
   *     $user = auth()->user();
    *    if (!$user) {
     *       return redirect('/login');
      *  }
    *
     *   $posts = Barang::where('user_id', $user->id)->get();
      *  return view('userPosts', compact('posts'));
    *}
*/

    public function __construct()
    {
        $this->middleware('auth')->only('show','edit','store','create','userPost');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', ['barang' => $barang]);
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
        
            $barang = Barang::find($id);
        
            // Update gambar jika ada gambar baru yang diupload
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($barang->gambar != null) {
                    Storage::delete('gambar/' . $barang->gambar);
                }
                // Simpan gambar baru
                $namaGambar = uniqid() . '.' . $request->file('gambar')->extension();
                $request->file('gambar')->storeAs('gambar', $namaGambar);
                $barang->gambar = $namaGambar;
            }
        
            // Update data barang
            $barang->nama_barang = $validatedData['nama_barang'];
            $barang->kategori = $validatedData['kategori'];
            $barang->deskripsi = $validatedData['deskripsi'];
            $barang->lokasi = $validatedData['lokasi'];
            $barang->kontak = $validatedData['kontak'];
            $barang->tanggal = $validatedData['tanggal'];
            //$barang->user_id = auth()->user()->id; // menyimpan user ID

            $barang->save();
        
            return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
        }
        
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        $barang= Barang::find($id);
        $delete = DB::table('barang')->where('id_barang','=',$id)->delete();
        $delete;
        Storage::delete('gambar/'.$barang->gambar);
        return redirect()->route('barang.index')->with('success','Barang Berhasil dihapus.');
    }
}
