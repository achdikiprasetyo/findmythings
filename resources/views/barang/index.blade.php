@extends('layouts.main')
@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('search.index') }}" method="GET">
        <div class="input-group my-5 row">
            <select class="form-select col-3" name="kategori">
                <option value="" selected>Pilih Kategori</option>
                <option value="Hilang">Hilang</option>
                <option value="cari">Cari</option>
            </select>
            <input type="date" class="form-control col-1" name="tanggal" id="tanggal" placeholder="Tanggal" >
            <div class="form-outline col-7">
                <input type="search" id="form1" class="form-control " placeholder="Search" name="query"/>
            </div>
            <button type="submit" class="btn btn-primary col-1">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <h3 class="text-center fw-bold mb-5">LIST BARANG </h3>
    <div class="container d-flex">
        <div class="row justify-content-around g-2">

            @foreach ($barang as $data)
                <div class="col-lg-5 mb-3 ">
                    <div class="card">
                        <div class="row ">
                            <div class="col-5">
                                <img src="{{ asset('storage/gambar/' . $data->gambar) }}" alt=""
                                    class="w-100 object-fit-cover" height="250px">
                            </div>
                            <div class="col my-3">
                                <h3 class="bold">{{ $data->nama_barang }}</h3>
                                <span class="badge text-bg-success mb-3">{{ $data->kategori }}</span>
                                <div class="deskripsi">{{ Str::limit($data->deskripsi, 100) }}</div>
                                <a href="{{ route('barang.show', $data->id_barang) }}"
                                    class="btn btn-primary mt-3">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>


    </div>
@endsection
