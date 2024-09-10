@extends('user.layout.template')
@section('content')
<div class="mx-auto text-center" style="padding: 9rem 0; max-width: 420px;">
    <form>
        <img class="mb-4" src="/img/sneakspark-logo-black.png" alt="" width="120" height="120">
        <h1 class="h3 mb-3 fw-normal">Silahkan daftar</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputName" placeholder="Nama Lengkap" required>
            <label for="inputName">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputNoHandphone" placeholder="No. Handphone" required>
            <label for="noHandphone">No. Handphone</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="inputEmail" placeholder="nama@contoh.com">
            <label for="inputEmail">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            <label for="inputPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputRetypePassword" placeholder="Ketik Ulang Password">
            <label for="inputRetypePassword">Ketik Ulang Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
    </form>
</div>
@endsection
