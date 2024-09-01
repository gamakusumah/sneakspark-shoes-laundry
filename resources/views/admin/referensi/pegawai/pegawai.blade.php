@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Pegawai
</button>
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. Handphone</th>
                    <th>Email</th>
                    <th>Posisi</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>No. Handphone</th>
                    <th>Email</th>
                    <th>Posisi</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{$pegawai->nama}}</td>
                    <td>{{$pegawai->no_tlp}}</td>
                    <td>{{$pegawai->email}}</td>
                    <td>{{$pegawai->role}}</td>
                    <td>{{$pegawai->alamat}}</td>
                    <td>
                        <a href="/ubahPegawai/{{$pegawai->id}}" class="btn btn-outline-warning btn-sm">
                            Ubah
                        </a>
                        <a href="/dPegawai/{{$pegawai->id}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are You Sure You Want to Delete This?')">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/cPegawai" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" id="inputName" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="noHandphone" class="form-label">No. Handphone</label>
                        <input type="text" class="form-control" id="inputNoHandphone" name="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="selectPosition" class="form-label">Role / Fungsional</label>
                        <select id="selectPosition" class="form-select" name="role">
                            <option value="Owner">Owner</option>
                            <option value="Admin">Admin</option>
                            <option value="Resepsionis">Resepsionis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <textarea class="form-control" id="inputAddress" rows="4" name="alamat"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
