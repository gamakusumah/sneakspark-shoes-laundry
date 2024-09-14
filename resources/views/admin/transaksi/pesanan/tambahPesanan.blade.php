@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pesanan</li>
    <li class="breadcrumb-item active">#{{ $pemesan->kode_pesanan }}</li>
</ol>

<form action="/keranjangAdmin" method="POST">
<div class="row">
    <div class="col">
            @csrf
            <input type="hidden" name="idPemesan" value="{{ $pemesan->id }}">
            <div class="card mb-4 p-3">
                <div class="mb-3">
                    <label for="inputShoes" class="form-label">Kode Pesanan</label>
                    <input type="text" class="form-control" id="inputShoes" value="{{ $pemesan->kode_pesanan }}" disabled>
                </div>
            </div>
            <div class="card mb-4 p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="inputShoes" class="form-label">Nama Sepatu/Tas</label>
                            <input type="text" class="form-control" id="inputShoes" name="sepatu" required placeholder="Nama Sepatu/Tas">
                        </div>
                        <div class="mb-3">
                            <label for="pelayananDataList" class="form-label">Pelayanan</label>
                            <select class="js-example-basic-single" name="layanan" style="width: 100%;">
                                @foreach ($layanans as $layanan)
                                <option value="{{$layanan->id}}">[{{$layanan->kategori}}] {{$layanan->nama_layanan}} - Rp. {{number_format($layanan->harga,0,',','.')}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="inputNote" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="inputNote" name="keterangan" required rows="5"></textarea>
                            </div>
                    </div>    
                </div>                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
    </div>
</div>
</form>

<div class="card mb-4">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sepatu/Tas</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjangs as $keranjang)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$keranjang->nama_barang}}</td>
                    <td>{{$keranjang->nama_layanan}}</td>
                    <td>{{number_format($keranjang->harga,0,',','.')}}</td>
                    <td>{{$keranjang->keterangan}}</td>
                    <td>
                        <a href="/dKeranjang/{{$keranjang->id}}/{{ $pemesan->id }}" onclick="confirm(event)" class="btn btn-outline-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="3">Total Harga</th>
                    <th colspan="2">{{number_format($total,0,',','.')}}</th>
                    <th></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="mb-4 float-end">
    <a href="/pesanan" class="btn btn-secondary">Batal</a>
    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Pesanan</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pesanan Atas Nama</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/prosesPesanan" method="post">
            @csrf
            <input type="hidden" name="idPemesan" value="{{ $pemesan->id }}">
            <input type="hidden" name="total" value="{{ $total }}">
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kode Pesanan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="kodePesanan" value="{{ $pemesan->kode_pesanan }}" placeholder="Kode Pesanan" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Atas Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Atas Nama">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon/WhatsApp</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="noTlp" placeholder="Nomor Telephone/WhatsApp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Alamat Email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
            </div>
            <hr>
            <div class="mb-3">
                <label for="selectPosition" class="form-label">Tipe Pengiriman</label>
                <select id="selectPosition" name="tipe" class="form-select">
                    <option value="Ambil Sendiri">Ambil Sendiri</option>
                    <option value="Antar">Antar</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<script>
    function confirm(event) {
        event.preventDefault(); // Mencegah aksi default dari <a> tag

        // Menyimpan URL href dari elemen yang di klik
        var url = event.currentTarget.getAttribute('href');

        Swal.fire({
            title: "Hapus Pesanan?",
            text: "Yakin ingin mengahpus pesanan yang telah dibuat?!",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus Pesanan!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengarahkan ke URL yang disimpan jika pengguna mengkonfirmasi
                window.location.href = url;
            }
        });
    }
</script>
@endsection
