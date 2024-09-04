@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a href="/kategori">Kategori</a></li>
    <li class="breadcrumb-item active">{{ $kategori->nama }}</li>
</ol>


<div class="card p-4">
    <form action="/uKategori" method="POST">
        @csrf
        <input type="hidden" name="idKategori" value="{{$kategori->id}}">
        <div class="mb-3">
            <label for="inputName" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" id="inputName" value="{{$kategori->nama}}" name="kategori" required>
        </div>
        <div class="mb-3">
            <label for="inputAddress" class="form-label">Alamat</label>
            <textarea class="form-control" id="inputAddress" rows="4" name="keterangan">{{$kategori->keterangan}}</textarea>
        </div>
        <a href="/kategori" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
