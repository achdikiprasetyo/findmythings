@extends('layouts.main')

@section('container')
    <div class="row ">
        <div class="col-lg-5 mt-3">
            <h1 class="fw-bold text-center">BUAT LAPORAN PENGEMBALIAN</h1>
        </div>
        <div class="col-lg-7">
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('POST')

                <div class="col">
                    <div class="form-group mb-3">
                        <label for="user_nama" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="user_nama" id="user_nama"
                        placeholder="Nama Pemilik">
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-lg">
                                <label for="tangal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tangal"
                                    value="{{ $barang->tanggal }}" placeholder="Tanggal" readonly>
                            </div>
                            <div class="col-lg">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" id="lokasi"
                                    value="{{ $barang->lokasi }}" placeholder="Lokasi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-lg">
                                <label for="kontak" class="form-label">Kontak Pemilik</label>
                                <input type="text" class="form-control" name="user_kontak" id="user_kontak"
                                placeholder="Kontak Pemilik">
                            </div>
                            <div class="col-lg">
                                <label for="Gambar" class="form-label">Gambar</label>
                                <img src="{{ asset('storage/gambar/' . $barang->gambar) }}" alt="Gambar Barang"
                            style="max-height: 200px;">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_laporan" class="form-label">Deskripsi Laporan</label>

                        <textarea class="form-control" name="deskripsi_laporan" id="deskripsi_laporan" rows="4"></textarea>

                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="fileGambar" class="form-label">Input Foto Konfirmasi</label>
                        <input class="form-control" type="file" name="gambar" id="fileGambar" accept="image/*">
                    </div>
                    <div class="mt-2">
                        
                    </div>
                    {{-- Hidden Input --}}
                    <input type="hidden" name="barang_id" value="{{ $barang->id_barang }}">
                    <input type="hidden" name="user_id" value="{{ $barang->user_id }}">
                    <input type="hidden" name="status" value="Hilang">


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Sumbit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
