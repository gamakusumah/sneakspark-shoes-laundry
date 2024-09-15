@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<div class="d-flex justify-content-between">
    <div class="btn-group mb-4" role="group" aria-label="Basic mixed styles example">
      <a href="/pesanan" class="btn {{ $active == 'Menunggu Konfirmasi' ? 'btn-success' : 'btn-outline-secondary'}}">Menunggu Konfirmasi <span class="badge text-bg-danger">{{$menunggu}}</span></a>
      <a href="/pesananKondisi/{{$kondisi = 'Pengambilan'}}" class="btn {{ $active == 'Pengambilan' ? 'btn-success' : 'btn-outline-secondary'}}">Pengambilan <span class="badge text-bg-danger">{{$pengambilan}}</span></a>
      <a href="/pesananKondisi/{{$kondisi = 'Proses'}}" class="btn {{ $active == 'Proses' ? 'btn-success' : 'btn-outline-secondary'}}">Proses <span class="badge text-bg-danger">{{$proses}}</span></a>
      <a href="/pesananKondisi/{{$kondisi = 'Selesai'}}" class="btn {{ $active == 'Selesai' ? 'btn-success' : 'btn-outline-secondary'}}">Selesai <span class="badge text-bg-danger">{{$selesai}}</span></a>
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
                    <th>Kode Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($antrians as $antrian)
                <tr>
                    <td>{{$antrian->kode_pesanan}}</td>
                    <td>{{$antrian->created_at}}</td>
                    <td>{{$antrian->nama}}</td>
                    <td><span class="badge rounded-pill bg-success">{{$antrian->status}}</span></td>
                    <td>
                        <a href="/pesananDetail/{{$antrian->id}}" class="btn btn-success btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
