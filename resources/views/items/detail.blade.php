@extends('layouts.main')

@section('container')
    @if ($item)
        <form action="{{ route('items.destroy', $item->id, $item->gambar) }}" method="post">
            <a href="{{ route('items.index') }}" class="btn btn-light mb-5">Kembali</a>
            @csrf
            @method('DELETE')
            {{-- <input type="hidden" name="gambar" value="{{ $item->gambar }}"> --}}
            <button type="submit" class="btn btn-danger mb-3 float-end">Hapus</button>
            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary mb-3 float-end mx-2">Edit</a>
        </form>

        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('storage/gambar/'.$item->gambar) }}" alt="" class="img-fluid">
            </div>
            <div class="col-lg">
                <div class="p-5 h-100 bg-body-tertiary rounded-3">
                    <div class="container-fluid pb-5">
                        <h1 class="display-5 fw-bold">{{ $item->nama_barang }}</h1>
                        <div class="row my-2"></div>
                        <span class="badge text-bg-primary mb-3">{{ $item->kategori }}</span>
                        <span class="badge text-bg-{{ ($item->status=='Dikembalikan') ? 'success' : 'warning' }} mb-3">{{ $item->status }}</span>
                        <div class="row my-2">
                            <div class="col-lg-3"><p>{{ $item->tanggal }}</p></div>
                            <div class="col-lg-3"><p>{{ $item->lokasi }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Item tidak ditemukan.</p>
    @endif
@endsection
