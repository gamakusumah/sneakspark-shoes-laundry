@extends('admin.layout.template')
@section('content')

<div class="row">
    <div class="col">
        <form>
            <div class="card mb-4 p-3">
                <div class="mb-3">
                    <select class="js-example-basic-single form-control" name="state">
                        <option value="AL">Alabama</option>
                        ...
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
            </div>
            <div class="card mb-4 p-3">
                <div class="mb-3">
                    <label for="inputShoes" class="form-label">Nama Sepatu/Tas</label>
                    <input type="text" class="form-control" id="inputShoes" required placeholder="Nama Sepatu/Tas">
                </div>
                <div class="mb-3">
                    <label for="pelayananDataList" class="form-label">Pelayanan</label>
                    <input class="form-control" list="pelayananlistOptions" id="pelayananDataList" placeholder="Cari Pelayanan ...">
                    <datalist id="pelayananlistOptions">
                        <option value="Layanan 1">LY001 - Rp80.000</option>
                        <option value="Layanan 2">LY002 - Rp100.000</option>
                    </datalist>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col">
        <div class="card mb-4 p-3">
            <form>
                <div class="mb-3">
                    <label for="selectPosition" class="form-label">Tipe Pengiriman</label>
                    <select id="selectPosition" class="form-select">
                        <option>Ambil Sendiri</option>
                        <option>Antar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputNote" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="inputNote" rows="4"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sepatu/Tas</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Adidas Samba</td>
                    <td>Layanan 1</td>
                    <td>Rp80.0000</td>
                    <td>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#alertModal">
                            Hapus
                        </button>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Total Harga</th>
                    <th colspan="2">Rp180.000</th>
                    <th></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="mb-4 float-end">
    <a href="/pesanan" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
