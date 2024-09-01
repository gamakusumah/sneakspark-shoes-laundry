@extends('admin.layout.template')
@section('content')
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
                <tr>
                    <td>Pelayanan 1</td>
                    <td>Rp80.0000</td>
                    <td>Basic</td>
                    <td>Deskripsi cuci sepatu</td>
                    <td>
                        <a href="/pelayanan/ubah/1" class="btn btn-outline-warning btn-sm">
                            Ubah
                        </a>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#alertModal">
                            Hapus
                        </button>
                    </td>
                </tr>
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
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Pelayanan</label>
                        <input type="text" class="form-control" id="inputName" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Pelayanan</label>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Alert Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus data pelayanan?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data pelayanan ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
@endsection
