@extends('user.layout.template')
@section('content')
<div class="mx-auto text-center" style="padding: 9rem 0; max-width: 420px;">
    <form>
        <img class="mb-4" src="/img/sneakspark-logo-black.png" alt="" width="120" height="120">
        <h1 class="h3 mb-3 fw-normal">Silahkan masuk</h1>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="nama@contoh.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
        <div class="py-4">Belum punya akun?</div>
        <a class="w-100 btn btn-lg btn-outline-primary" href="/daftar">Daftar</a>
        <p class="mt-5 mb-3 text-muted">© 2024</p>
    </form>
</div>
@endsection
