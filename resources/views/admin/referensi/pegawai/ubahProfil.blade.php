@extends('admin.layout.template')
@section('content')
<div class="mx-auto mt-5" style="max-width: 420px;">
    <form>
        <h1 class="h3 mb-3 fw-normal">Ubah Profil</h1>
        <hr />

        <div class="form-floating mt-4 mb-3">
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
            <textarea class="form-control" id="inputAddress" rows="5" name="alamat" placeholder="Alamat"></textarea>
            <label for="inputAddress">Alamat</label>
        </div>
        <div class="d-flex gap-2">
            <button class="w-100 btn btn-primary" type="submit">Ubah Profil</button>
            <a href="/pegawai/profil" class="w-100 btn btn-secondary" type="submit">Batal</a>
        </div>
    </form>
</div>
@endsection
