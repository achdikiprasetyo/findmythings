@extends('layouts.main')

@section('container')
    <div class="row ">
        <div class="col-lg-5 mt-3">
            <h1 class="fw-bold text-center">EDIT POSTINGAN</h1>
        </div>
        <div class="col-lg-7">
            <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="col">
                    <div class="form-group mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="namaBarang"
                            value="{{ $barang->nama_barang }}" placeholder="Nama Barang">
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-lg">
                                <label for="tangal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tangal"
                                    value="{{ $barang->tanggal }}" placeholder="Tanggal">
                            </div>
                            <div class="col-lg">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" id="lokasi"
                                    value="{{ $barang->lokasi }}" placeholder="Lokasi">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-lg">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input type="text" class="form-control" name="kontak" id="kontak"
                                    value="{{ $barang->kontak }}" placeholder="Kontak">
                            </div>
                            <div class="col-lg">
                                <label for="Kategori" class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option selected>Hilang</option>
                                    <option value="cari">Cari</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>

                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4">{{ $barang->deskripsi }}</textarea>

                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="fileGambar" class="form-label">Input Gambar</label>
                        <input class="form-control" type="file" name="gambar" id="fileGambar" accept="image/*">
                    </div>
                    <div class="mt-2">
                        <img src="{{ asset('storage/gambar/' . $barang->gambar) }}" alt="Gambar Barang"
                            style="max-height: 200px;">
                    </div>

                    <input type="hidden" name="status" value="Hilang">
                    {{-- <input type="hidden" name="tanggal_post" > --}}
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Sumbit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
