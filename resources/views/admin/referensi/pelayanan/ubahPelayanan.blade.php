@extends('admin.layout.template')
@section('content')
<div class="card p-4">
    <form>
        <div class="mb-3">
            <label for="inputName" class="form-label">Nama Layanan</label>
            <input type="text" class="form-control" id="inputName" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga Layanan</label>
            <input type="number" class="form-control" id="inputPrice" required>
        </div>
        <div class="mb-3">
            <label for="inputCategory" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="inputCategory">
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="inputDescription" rows="4"></textarea>
        </div>
        <a href="/pelayanan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
