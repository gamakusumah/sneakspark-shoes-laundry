@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/pesanan" class="nav-link">Pesanan</a></li>
    <li class="breadcrumb-item active">{{$pesanan->kode_pesanan}}</li>
</ol>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-bold mb-4">Detail Pesanan</h5>
                <table class="table card mb-4">
                    <tr>
                        <td scope="col">Kode Pesanan</td>
                        <td scope="col">{{$pesanan->kode_pesanan}}</td>
                    </tr>
                    <tr>
                        <td scope="col">Atas Nama</td>
                        <td scope="col">{{$bidata->nama}}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Telephone / WhatsApp</td>
                        <td scope="col">{{$bidata->no_tlp}}</td>
                    </tr>
                    <tr>
                        <td scope="col">Email</td>
                        <td scope="col">{{$bidata->email}}</td>
                    </tr>
                    <tr>
                        <td scope="col">Alamat</td>
                        <td scope="col">{{$bidata->alamat}}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tipe</td>
                        <td scope="col">{{$bidata->tipe_pengiriman}}</td>
                    </tr>
                </table>
                <ol class="list-group list-group-numbered">
                    @foreach ($detailPesanans as $detail)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">{{$detail->nama_layanan}}</div>
                        <small>{{$detail->nama_barang}}</small><br>
                        <small>{{$detail->keterangan}}</small>
                      </div>
                      <span class="badge text-bg-primary rounded-pill">Rp. {{number_format($detail->nominal,0,',','.')}}</span>
                    </li>
                    @endforeach
                  </ol>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Transaksi</h5>
                        <div class="d-flex justify-content-between">
                            <p>Bukti Pembayaran</p>
                            <div>
                                <a class="badge text-bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Lihat Bukti
                            </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Total</p>
                            <b>{{number_format($pesanan->total,0,',','.')}}</b>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Diskon</p>
                            <b>{{$pesanan->diskon}} %</b>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Total Pembayaran</p>
                            <b>{{number_format($pesanan->nominal,0,',','.')}}</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-4">
                <form action="/prosesTransaksi" method="post">
                    @csrf
                    <input type="hidden" name="idPesanan" value="{{$pesanan->id}}">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Proses Transaksi</h5>
                        <div class="mb-3">
                            <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="status">
                                <option value="{{$pesanan->status}}" selected>{{$pesanan->status}}</option>
                                <option value="Pengambilan">Pengambilan Oleh Petugas</option>
                                <option value="Proses">Proses</option>
                                <option value="Batal">Batal / Pembayaran Tidak Sesuai</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="submit">Konfirmasi Pesanan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>    
</div> 


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12">
            @if ($pembayaran == null)
                <div class="alert alert-success" role="alert">
                Pembayaran Langsung!
                </div>
            @else
                <img src="{{asset('storage/' . $pembayaran->bukti)}}" class="img-fluid" alt="bukti">
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection