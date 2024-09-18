@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Vocher
</button>
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Kode Vocher</th>
                    <th>Jumlah Pakai</th>
                    <th>Diskon (%)</th>
                    <th>Minimal Order</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Kode Vocher</th>
                    <th>Jumlah Pakai</th>
                    <th>Diskon (%)</th>
                    <th>Minimal Order</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($vochers as $vocher)
                <tr>
                    <td>{{$vocher->kode_vocher}}</td>
                    <td>{{$vocher->jumlah_pakai}}</td>
                    <td>{{$vocher->diskon_persen}}</td>
                    <td>{{number_format($vocher->min_order,0,',','.')}}</td>
                    <td>{{$vocher->keterangan}}</td>
                    <td>{{$vocher->status}}</td>
                    <td>
                        <a href="/ubahVocher/{{$vocher->id}}" class="btn btn-outline-warning btn-sm">
                            Ubah
                        </a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Vocher Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/cVocher" method="POST">
                @csrf
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Kode Vocher</label>
                        <input type="text" class="form-control" id="inputName" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Jumlah Pakai</label>
                        <input type="number" class="form-control" id="inputPrice" name="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Diskon (%)</label>
                        <input type="number" class="form-control" id="inputPrice" name="diskon" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Minimal Order</label>
                        <input type="number" class="form-control" id="inputPrice" name="minorder" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="inputDescription" rows="4" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="selectPosition" class="form-label">Status</label>
                        <select id="selectPosition" class="form-select" name="status">
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
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
