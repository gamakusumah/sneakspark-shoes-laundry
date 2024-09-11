@extends('user.layout.template')
@section('content')
<div class="mx-auto text-center mt-5" style="max-width: 420px;">
    <form action="/register" method="POST">
        @csrf
        <img class="mb-4" src="/img/sneakspark-logo-black.png" alt="" width="120" height="120">
        <h1 class="h3 mb-3 fw-normal">Silahkan daftar</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputName" name="nama" placeholder="Nama Lengkap" required>
            <label for="inputName">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputNoHandphone" name="no_tlp" placeholder="No. Handphone" required>
            <label for="noHandphone">No. Handphone</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="nama@contoh.com">
            <label for="inputEmail">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            <label for="inputPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputRetypePassword" name="confPassword" placeholder="Ketik Ulang Password">
            <label for="inputRetypePassword">Ketik Ulang Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
        <p class="mt-5 mb-3 text-muted">© 2024</p>
    </form>
</div>
@endsection
