@extends('layouts.main')
@section('container')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h3 class="my-2 display-2 fw-bold ls-tight">
                        Find My Things <br />
                        <span class="text-primary">temukan barang</span>
                    </h3>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        FindMyThings Merupakan sebuah website untuk melakukan
                        pencarian dan pengembalian barang hilang yang mencakup
                        seluruh daerah kampus UPN "Veteran" Jawa Timur.
                    </p>
                </div>
                
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                <form method="POST" action="{{ url('/login') }}">
                    @csrf
  
                  <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" value="{{Session::get('email')}}" id="form3Example3" class="form-control" name="email" />
                    <label class="form-label" for="form3Example3">Email address</label>
                </div>
                
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form3Example4" class="form-control" name="password" />
                    <label class="form-label" for="form3Example4">Password</label>
                </div>
                
                    
 
                    
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">
                        Login 
                    </button>
                    
                    <!-- Submit button -->
                    {{-- <a href="{{ route('login.create') }}"></a> --}}
                    <button type="submit" class="btn btn-primary btn-block mb-4">
                        Register
                    </button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection