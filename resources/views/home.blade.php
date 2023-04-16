@extends('layouts.main')

@section('container')
    <div class="row ">
        <div class="col-4">
            <img src="{{ asset('img/search.jpg') }}" alt="" class="w-100 h-100 object-fit-cover rounded" style="object-position: 20% 100%">
        </div>
        <div class="col">
            <div class="py-5 bg-body-tertiary rounded-3" style="height: 75vh">
                <div class="container m-5">
                  <h1 class="display-5 fw-bold my-4">Find My Things</h1>
                  <p class="col-md-8 fs-4 my-4">Software Aplikasi Web Penemuan dan Pencarian Barang Hilang</p>
                  <div class="d-flex justify-content-between col-4">
                    {{-- <div class="col-3"> --}}
                        <a href="{{ route('items.index') }}" class="btn btn-primary btn-md my-5 mr-3">Cari Barang</a>
                    {{-- </div>
                    <div class="col-3"> --}}
                        <a href="{{ route('items.create') }}" class="btn btn-primary btn-md my-5">Posting Barang</a>
                    {{-- </div> --}}
                    
                  </div>

                </div>
              </div>
        </div>
    </div>
@endsection