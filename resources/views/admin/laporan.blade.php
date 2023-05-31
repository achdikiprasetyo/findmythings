@extends('layouts.main')
@section('container')
    <div class="row">
        <div class="col-2 my-5">
            @include('layouts.sidebar')
        </div>
        <div class="col-10">
            <h3 class="text-center fw-bold mb-4">LIST LAPORAN </h3>
            <div class="container d-flex">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pemilik</th>
                            <th scope="col">Kontak Pemilik</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Foto Barang</th>
                            <th scope="col">Foto Konfirmasi</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $data->id_laporan }}</th>
                                <td>{{ $data->user_nama }}</td>
                                <td>{{ $data->user_kontak }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td><img src="{{ asset('storage/gambar/' . $data->gambar) }}" alt="" height="80px">
                                </td>
                                <td><img src="{{ asset('storage/gambar/laporan/' . $data->foto_konfirmasi) }}"
                                        alt="" height="80px"></td>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
