@extends('layouts.main')
@section('container')
<h3 class="text-center fw-bold mb-5">LIST BARANG </h3>
    <div class="container d-flex">
        <div class="row justify-content-around g-2">
        
            @foreach ($items as $data )
            <div class="col-lg-5 mb-3 ">
                <div class="card">
                    <div class="row ">
                        <div class="col-5">
                            <img src="{{ asset('storage/gambar/'.$data->gambar) }}" alt="" class="w-100 object-fit-cover" height="250px">
                        </div>
                        <div class="col my-3">
                            <h3 class="bold">{{ $data->nama_barang }}</h3>
                            <span class="badge text-bg-success mb-3">{{ $data->kategori }}</span>
                            <div class="deskripsi">{{ Str::limit($data->deskripsi, 100) }}</div>
                            <a href="/items/{{ $data->id }}" class="btn btn-primary mt-3">Lihat</a>
                        </div>
                    </div>
                </div>  
            </div>
            @endforeach



            
        </div>
        

    </div>
@endsection