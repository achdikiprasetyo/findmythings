@extends('layouts.main')

@section('container')
    @if ($barang)
        <form action="{{ route('barang.destroy', $barang->id_barang, $barang->gambar) }}" method="post">
            <a href="{{ route('barang.index') }}" class="btn btn-light mb-5">Kembali</a>
            @csrf
            @method('DELETE')
            @if (Gate::allows('edit-barang', $barang))
                <button type="submit" class="btn btn-danger mb-3 float-end">Hapus</button>
                <a href="{{ route('barang.edit', $barang->id_barang) }}" class="btn btn-primary mb-3 float-end mx-2">Edit</a>
            @endif

        </form>

        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('storage/gambar/' . $barang->gambar) }}" alt="" class="img-fluid">
            </div>
            <div class="col-lg">
                <div class="p-5 h-100 bg-body-tertiary rounded-3">
                    <div class="container-fluid pb-5">
                        <h1 class="display-5 fw-bold">{{ $barang->nama_barang }}</h1>
                        <div class="row my-2"></div>
                        <span class="badge text-bg-primary mb-3">{{ $barang->kategori }}</span>
                        <span
                            class="badge text-bg-{{ $barang->status == 'Dikembalikan' ? 'success' : 'warning' }} mb-3">{{ $barang->status }}</span>
                        <div class="row my-2">
                            <div class="col-lg-3">
                                <p>{{ $barang->tanggal }}</p>
                            </div>
                            <div class="col-lg-3">
                                <p>{{ $barang->lokasi }}</p>
                            </div>
                        </div>
                        <p class="col-md-12 fs-5 my-3">{{ $barang->deskripsi }}</p>
                        <h5 class="mt-4">Kontak</h5>
                        <p>{{ $barang->kontak }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Barang tidak ditemukan.</p>
    @endif
@endsection
