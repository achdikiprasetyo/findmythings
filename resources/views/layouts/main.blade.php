<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="position-relative">





    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <a class="navbar-brand" href="/">Find My Things</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link link-opacity-50-hover link-dark" href="{{ route('barang.index') }}">Cari</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link link-opacity-50-hover link-dark " href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link link-opacity-50-hover link-dark " href="{{ route('barang.create') }}">Posting</a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link link-opacity-50-hover link-dark" href="{{ route('admin.index') }}">Admin
                                Panel</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link link-opacity-50-hover link-dark"
                                href="{{ route('barang.userPost') }}">Postinganku</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form method="GET" action="{{ route('login.logout') }}">
                            @csrf
                            <button type="submit" class="nav-link link-opacity-50-hover link-dark"
                                style="background-color:transparent; border:none; cursor:pointer;"
                                href="{{ route('login.logout') }}">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>


    <div class="container min-vh-100 mt-5">
        @yield('container')
    </div>


    {{-- footer --}}
    <footer class="bg-light text-center text-lg-start position-absolute  w-100 ">
        <!-- Copyright -->
        <div class="text-white text-center p-3" style="background-color: rgba(0, 0, 0, 0.9);">
            © 2022 Copyright:
            <a class="text-white" style="text-decoration: none;" href="https://werdaily.com/">Kelompok 5</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
