@extends('user.layout.template')
@section('content')
<div class="mx-auto mt-5" style="max-width: 420px;">
    <form action="/changePassword" method="POST">
        @csrf
        <input type="hidden" name="idUser" value="{{ auth('web')->user()->id }}">
        <h1 class="h3 mb-3 fw-normal">Ubah Password</h1>
        <hr />
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" name="newPassword" placeholder="Password Baru">
            <label for="inputNewPassword">Password Baru</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputRetypePassword" name="confPassword" placeholder="Ketik Ulang Password Baru">
            <label for="inputRetypeNewPassword">Ketik Ulang Password Baru</label>
        </div>
        <div class="d-flex gap-2">
            <button class="w-100 btn btn-primary" type="submit">Ubah Password</button>
            <a href="/profil" class="w-100 btn btn-secondary" type="submit">Batal</a>
        </div>
    </form>
</div>
@endsection
