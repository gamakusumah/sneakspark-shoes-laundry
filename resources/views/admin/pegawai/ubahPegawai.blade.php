@extends('admin.layout.template')
@section('content')
<div class="card p-4">
    <form>
        <div class="mb-3">
            <label for="inputName" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" id="inputName" required>
        </div>
        <div class="mb-3">
            <label for="noHandphone" class="form-label">No. Handphone</label>
            <input type="text" class="form-control" id="inputNoHandphone" required>
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail">
        </div>
        <div class="mb-3">
            <label for="selectPosition" class="form-label">Disabled select menu</label>
            <select id="selectPosition" class="form-select">
                <option>Pemilik</option>
                <option>Admin</option>
                <option>Resepsionis</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="inputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword1">
        </div>
        <div class="mb-3">
            <label for="inputRetypePassword" class="form-label">Ketik Ulang Password</label>
            <input type="password" class="form-control" id="inputRetypePassword">
        </div>
        <div class="mb-3">
            <label for="inputAddress" class="form-label">Alamat</label>
            <textarea class="form-control" id="inputAddress" rows="4"></textarea>
        </div>
        <a href="/pegawai" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
