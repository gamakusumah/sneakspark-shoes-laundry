@extends('admin.layout.template')
@section('content')


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a href="/pelayanan">Pelayanan</a></li>
    <li class="breadcrumb-item active">{{ $layanan->nama_layanan }}</li>
</ol>

<div class="card p-4">
    <form action="/uLayanan" method="POST">
        @csrf
        <input type="hidden" name="idLayanan" value="{{$layanan->id}}">
        <div class="mb-3">
            <label for="inputName" class="form-label">Nama Layanan</label>
            <input type="text" class="form-control" id="inputName" name="layanan" value="{{$layanan->nama_layanan}}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga Layanan</label>
            <input type="number" class="form-control" id="inputPrice" name="harga" value="{{$layanan->harga}}" required>
        </div>
        <div class="mb-3">
            <label for="selectPosition" class="form-label">Kategori</label>
                <select id="selectPosition" class="form-select" name="kategori">
                    @foreach ($kategoris as $kategori)
                    @if ($layanan->idKategori == $kategori->id)
                        <option value="{{$kategori->id}}" selected>{{$kategori->nama}}</option>
                    @endif
                        <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                    @endforeach
                </select>
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="inputDescription" rows="4" name="keterangan">{{$layanan->deskripsi}}</textarea>
        </div>
        <a href="/pelayanan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
