@extends('user.layout.template')
@section('content')
<div class="mx-auto mt-5" style="max-width: 420px;">
    <form action="/uProfile" method="POST">
        @csrf
        <input type="hidden" name="idUser" value="{{ auth('web')->user()->id }}">
        <h1 class="h3 mb-3 fw-normal">Ubah Profil</h1>
        <hr />

        <div class="form-floating mt-4 mb-3">
            <input type="text" class="form-control" id="inputName" name="nama" value="{{ auth('web')->user()->name }}" placeholder="Nama Lengkap" required>
            <label for="inputName">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputNoHandphone" name="no_tlp" value="{{ auth('web')->user()->no_tlp }}" placeholder="No. Handphone" required>
            <label for="noHandphone">No. Handphone</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ auth('web')->user()->email }}" placeholder="nama@contoh.com">
            <label for="inputEmail">Email</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" name="alamat" id="floatingTextarea2" style="height: 100px">{{ auth('web')->user()->alamat }}</textarea>
            <label for="floatingTextarea2">Alamat</label>
        </div>
        <div class="d-flex gap-2">
            <button class="w-100 btn btn-primary" type="submit">Ubah Profil</button>
            <a href="/profil" class="w-100 btn btn-secondary" type="submit">Batal</a>
        </div>
    </form>
</div>
@endsection
