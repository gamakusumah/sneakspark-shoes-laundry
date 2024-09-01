@extends('admin.layout.template')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
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
@endsection
