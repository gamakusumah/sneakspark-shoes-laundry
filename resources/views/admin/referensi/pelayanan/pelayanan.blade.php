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
                    <th>Nama Pelayanan</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($layanans as $layanan)
                <tr>
                    <td>{{$layanan->nama_layanan}}</td>
                    <td>{{number_format($layanan->harga,0,',','.')}}</td>
                    <td>{{$layanan->kategori}}</td>
                    <td>{{$layanan->deskripsi}}</td>
                    <td>
                        <a href="/ubahLayanan/{{$layanan->id}}" class="btn btn-outline-warning btn-sm">
                            Ubah
                        </a>
                        <a href="/dLayanan/{{$layanan->id}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are You Sure You Want to Delete This?')">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelayanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/cLayanan" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Banner layanan</label>
                        <input type="file" class="form-control" id="inputName" name="image" accept=".png, .jpg, .jpeg" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Pelayanan</label>
                        <input type="text" class="form-control" id="inputName" name="layanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Pelayanan</label>
                        <input type="number" class="form-control" id="inputPrice" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="selectPosition" class="form-label">Kategori</label>
                        <select id="selectPosition" class="form-select" name="kategori">
                            @foreach ($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                            @endforeach
                        </select>
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
