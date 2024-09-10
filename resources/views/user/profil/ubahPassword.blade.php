@extends('user.layout.template')
@section('content')
<div class="mx-auto mt-5" style="padding: 9rem 0; max-width: 420px;">
    <form>
        <h1 class="h3 mb-3 fw-normal">Ubah Password</h1>
        <hr />
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password Lama">
            <label for="inputOldPassword">Password Lama</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password Baru">
            <label for="inputNewPassword">Password Baru</label>
        </div>
        <div class="row">

        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputRetypePassword" placeholder="Ketik Ulang Password Baru">
            <label for="inputRetypeNewPassword">Ketik Ulang Password Baru</label>
        </div>
        <div class="d-flex gap-2">
            <button class="w-100 btn btn-primary" type="submit">Ubah Password</button>
            <a href="/profil" class="w-100 btn btn-secondary" type="submit">Batal</a>
        </div>
    </form>
</div>
@endsection
