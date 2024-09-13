@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<div class="d-flex justify-content-between">
    <div class="btn-group mb-4" role="group" aria-label="Basic mixed styles example">
      <button type="button" class="btn btn-success">Pengambilan <span class="badge text-bg-primary">4</span></button>
      <button type="button" class="btn btn-outline-secondary">Antrian <span class="badge text-bg-danger">4</span></button>
      <button type="button" class="btn btn-outline-secondary">Proses <span class="badge text-bg-danger">4</span></button>
      <button type="button" class="btn btn-outline-secondary">Selesai <span class="badge text-bg-danger">4</span></button>
    </div>
    <!-- Link Tambah Pesanan -->
    <a href="/addPesanan" onclick="confirm(event)" class="btn btn-primary mb-4">
        Tambah Pesanan
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Id Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>TR00001</td>
                    <td>1 Juli 2024</td>
                    <td>Gama Kusumah</td>
                    <td>Layanan 1</td>
                    <td><span class="badge rounded-pill bg-success">Selesai</span></td>
                    <td>
                        <a href="/pegawai/ubah/1" class="btn btn-outline-warning btn-sm">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="pelangganDataList" class="form-label">Pelanggan</label>
                        <input class="form-control" list="pelangganlistOptions" id="pelangganDataList" placeholder="Cari Pelanggan ...">
                        <datalist id="pelangganlistOptions">
                            <option value="Gama Kusumah">ID001 - 08987126212</option>
                            <option value="Kemal Ramadhan">ID002 - 08587126212</option>
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="pelayananDataList" class="form-label">Pelayanan</label>
                        <input class="form-control" list="pelayananlistOptions" id="pelayananDataList" placeholder="Cari Pelayanan ...">
                        <datalist id="pelayananlistOptions">
                            <option value="Layanan 1">LY001 - Rp80.000</option>
                            <option value="Layanan 2">LY002 - Rp100.000</option>
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="selectPosition" class="form-label">Tipe Pengiriman</label>
                        <select id="selectPosition" class="form-select">
                            <option>Ambil Sendiri</option>
                            <option>Antar</option>
                        </select>
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

<script>
    function confirm(event) {
        event.preventDefault(); // Mencegah aksi default dari <a> tag

        // Menyimpan URL href dari elemen yang di klik
        var url = event.currentTarget.getAttribute('href');

        Swal.fire({
            title: "Buat Pesanan Baru?",
            text: "Membuat Pesanan Baru!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Buat Pesanan Baru!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengarahkan ke URL yang disimpan jika pengguna mengkonfirmasi
                window.location.href = url;
            }
        });
    }
</script>
@endsection
