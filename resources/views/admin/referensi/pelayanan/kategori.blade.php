@extends('admin.layout.template')
@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Pelayanan
</button>
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{$kategori->nama}}</td>
                    <td>{{$kategori->keterangan}}</td>
                    <td>
                        <a href="/ubahKategori/{{$kategori->id}}" class="btn btn-outline-warning btn-sm">
                            Ubah
                        </a>
                        <a href="/dKategori/{{$kategori->id}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are You Sure You Want to Delete This?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/cKategori" method="POST">
                @csrf
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="inputName" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="inputDescription" rows="4" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
    </div>
</div>
@endsection
