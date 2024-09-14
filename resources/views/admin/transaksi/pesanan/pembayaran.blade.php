@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pesanan</li>
    <li class="breadcrumb-item active">#{{ $pemesan->kode_pesanan }}</li>
</ol>

<div class="row">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-body">
                <h3 class="fw-bold">
                    Checkout
                </h3>
                <hr>
                <div class="d-flex justify-content-between">
                    <p>Kode Pesanan <span class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Detail
                      </span>
                    </p>
                    <b>{{ $pemesan->kode_pesanan }}</b>
                </div>
                <hr>
                @foreach ($keranjangs as $keranjang)
                <div class="d-flex justify-content-between">
                    <p>{{$keranjang->nama_barang}} <span class="fw-bold">[{{$keranjang->nama_layanan}}]</span></p>
                    <b>{{number_format($keranjang->harga,0,',','.')}}</b>
                </div>
                @endforeach
                <hr>
                <form action="/cekVocher" method="post">
                @csrf
                <input type="hidden" name="idPemesan" value="{{ $pemesan->id }}">
                <input type="hidden" name="total" value="{{ $total }}">
                <input type="hidden" name="idPesanan" value="{{ $pesanan->id }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Kode Vocher ..." name="kode" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                    <button class="btn btn-success" type="submit" id="button-addon2">Cek Kode</button>
                </div>
                </form>
                <hr>
                <div class="d-flex justify-content-between">
                    <p>Tipe Pengiriman</p>
                    <b>{{$pesanan->tipe_pengiriman}}</b>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Total</p>
                    <b>{{number_format($total,0,',','.')}}</b>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Diskon</p>
                    <b>{{$pesanan->diskon}} %</b>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="fw-bold">Total Pembayaran</p>
                    <b>{{number_format($pesanan->nominal,0,',','.')}}</b>
                </div>
                <hr>
                <form action="/strukAdmin" method="post" id="formD" name="formD">
                    @csrf
                    <input type="hidden" name="idPemesan" value="{{ $pemesan->id }}">
                    <input type="hidden" name="idPesanan" value="{{ $pesanan->id }}">
                <div class="mb-3">
                    <input type="hidden" name="nominal" id="nominal" value="{{$pesanan->nominal}}">
                    <input type="text" class="form-control" id="uangbayar" name="uangbayar" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" placeholder="Masukan Nominal" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="submit">Cetak Struk</button>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pemesan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card col-sm-12 mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p>Kode Pesanan</p>
                        <b>{{ $pemesan->kode_pesanan }}</b>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Atas Nama</p>
                        <b>{{ $pemesan->nama }}</b>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>No Telephone / WhatsApp</p>
                        <b>{{ $pemesan->no_tlp }}</b>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Email</p>
                        <b>{{ $pemesan->email }}</b>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Alamat</p>
                        <b>{{ $pemesan->alamat }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" language="Javascript">
        nominal = document.formD.nominal.value;
        document.formD.kembalian.value = total;
        bayar_uang = document.formD.uangbayar.value;
        document.formD.kembalian.value = bayar_uang;
        function OnChange(value){
        total = document.formD.nominal.value;
        bayar_uang = document.formD.uangbayar.value;
        ts = bayar_uang - total;
        document.formD.kembalian.value = ts;
        }
    </script>
@endsection
