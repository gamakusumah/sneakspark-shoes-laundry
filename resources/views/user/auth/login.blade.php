@extends('user.layout.template')
@section('content')
<div class="mx-auto text-center mt-5" style="max-width: 420px; margin-bottom: 72px;">
    <form action="/login" method="POST">
        @csrf
        <img class="mb-4" src="/img/sneakspark-logo-black.png" alt="" width="120" height="120">
        <h1 class="h3 mb-3 fw-normal">Silahkan masuk</h1>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="nama@contoh.com" required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
        <div class="py-4">Belum punya akun?</div>
        <a class="w-100 btn btn-lg btn-outline-primary" href="/daftar">Daftar</a>
    </form>
</div>
@endsection
