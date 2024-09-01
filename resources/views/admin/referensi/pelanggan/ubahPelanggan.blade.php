@extends('admin.layout.template')
@section('content')
<div class="card p-4">
    <form>
        <div class="mb-3">
            <label for="inputName" class="form-label">Nama Pelanggan</label>
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
            <label for="inputAddress" class="form-label">Alamat</label>
            <textarea class="form-control" id="inputAddress" rows="4"></textarea>
        </div>
        <a href="/pelanggan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
