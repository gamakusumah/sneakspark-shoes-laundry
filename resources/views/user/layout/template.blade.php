<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sneakspark Shoes Laundry</title>
    <link rel="icon" href="{{asset('img/sneakspark-logo.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('vendor/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="icon" href="{{asset('img/sneakspark-logo.png')}}" type="image/x-icon">

    {{-- select --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
    {{-- toast --}}
    @if (session()->has('Notification'))
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container top-0 end-0 p-3">
            <div class="show toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header b-primary">
                    <strong class="me-auto">Notofikasi Baru!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('Notification') }}
                </div>
            </div>
        </div>
    </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
        <div class="container">
            <a class="navbar-brand ps-3" href="/"><img src="/img/sneakspark-logo.png" width="50" /><span> Sneakspark</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#galeri">Galeri</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="/#kontak">Kontak</a>
                    </li>
                    @if (auth('web')->check() && auth('web')->user()->name)
                    <li class="nav-item me-4">
                        <a class="btn btn-outline-light px-4" href="/pesan">Pesan Sekarang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle show" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            {{ auth('web')->user()->name }}
                            <svg class="svg-inline--fa fa-user fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" data-bs-popper="static">
                            <li><a class="dropdown-item" href="/profil">Profil</a></li>
                            <li><a class="dropdown-item" href="/riwayat">Riwayat Pesanan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </button>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item me-4">
                        <a class="btn btn-outline-light px-4" href="/login">Masuk</a>
                    </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>

    <main class="form-signin">
        <!-- Content -->
        @yield('content')
    </main>

    <!-- Logout -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img class="mb-2 text-center" src="{{asset('images/icons/exit.png')}}" alt="exit" style="max-width: 200px;">
                    <h4 class="bold-text" style="color: black">Logout!</h4>
                    <p class="mb-2" style="color: black">are you sure you want to leave!</p>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button type="button" class="btn btn-secondary" style="margin-right: 10px;" data-bs-dismiss="modal">Batal</button>
                    <form action="/logoutUser" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger clickOne" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="my-5 py-3 border-top text-muted text-center text-small">
        <p class="mb-1">© 2024 Sneakspark Shoes Laundry</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
