@extends('layouts.main')
@section('container')
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h3 class="my-2 display-2 fw-bold ls-tight">REGISTER</h3>
                    <hr>
                    <h3 class="my-2 display-2 fw-bold ls-tight">
                        Find My Things <br />
                        <span class="text-primary">temukan barang</span>
                    </h3>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        findMyThings Merupakan sebuah website untuk melakukan
                        pencarian dan pengembalian barang hilang yang mencakup
                        seluruh daerah kampus UPN "Veteran" Jawa Timur.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5 text-left">
                            <form action="/register" method="POST">
                                @csrf

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama" required value="{{ old('nama') }}"/>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" id="username" class="form-control @error('username') is-invalid  @enderror" name="username" required value="{{ old('username') }}"/>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="email">Email address</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid  @enderror" name="email"  required value="{{ old('email') }}"/>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid  @enderror" name="alamat" id="alamat" rows="3" required >{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-outline ">
                                            <label class="form-label" for="no_hp">Nomor Handphone</label>
                                            <input type="text" id="no_hp" class="form-control @error('no_hp') is-invalid  @enderror" name="no_hp" required value="{{ old('no_hp') }}"/>
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-outline ">
                                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid  @enderror" name="tanggal_lahir" id="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid  @enderror" name="password" required value="{{ old('password') }}"/>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="role" value="user">

                                <!-- Checkbox -->
                                {{-- <div class="form-check d-flex justify-content-center mb-3">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33"
                                        checked />
                                    <label class="form-check-label" for="form2Example33">
                                        Dapatkan notifikasi barang hilang
                                    </label>
                                </div> --}}

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Daftar
                                </button>


                            </form>


                            <!-- Register buttons -->
                            {{-- <div class="text-center">
                                    <p>or sign up with:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
