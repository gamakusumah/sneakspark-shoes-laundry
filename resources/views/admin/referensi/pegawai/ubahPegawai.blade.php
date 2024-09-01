@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a href="/pegawai">Pegawai</a></li>
    <li class="breadcrumb-item active">{{ $pegawai->nama }}</li>
</ol>


<div class="card p-4">
    <form action="/uPegawai" method="POST">
        @csrf
        <input type="hidden" name="idPegawai" value="{{$pegawai->id}}">
        <div class="mb-3">
            <label for="inputName" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" id="inputName" value="{{$pegawai->nama}}" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="noHandphone" class="form-label">No. Handphone</label>
            <input type="text" class="form-control" id="inputNoHandphone" value="{{$pegawai->no_tlp}}" name="no_telp" required>
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" value="{{$pegawai->email}}" name="email">
        </div>
        <div class="mb-3">
            <label for="selectPosition" class="form-label">Role / Fungsional</label>
            <select id="selectPosition" class="form-select" name="role">
                <option value="{{$pegawai->role}}" selected>{{$pegawai->role}}</option>
                <option value="Owner">Owner</option>
                <option value="Admin">Admin</option>
                <option value="Resepsionis">Resepsionis</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="inputAddress" class="form-label">Alamat</label>
            <textarea class="form-control" id="inputAddress" rows="4" name="alamat">{{$pegawai->alamat}}</textarea>
        </div>
        <a href="/pegawai" class="btn btn-secondary">Batal</a>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Perbaharui Password
        </button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Perbaharui Password</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/uPasswordPegawai" method="POST">
        @csrf
        <input type="hidden" name="idPegawai" value="{{$pegawai->id}}">
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword1">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Perbaharui Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
