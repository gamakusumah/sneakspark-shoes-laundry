@extends('user.layout.template')
@section('content')
<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="/img/sneakspark-logo-black.png" alt="" width="150" height="150">
            <h2>Pesan Layanan</h2>
            <p class="lead">Isi form pemesanan di bawah ini dengan informasi yang lengkap. Kami akan menjemput sepatu Anda di lokasi yang Anda tentukan dan mengantarkannya kembali setelah selesai dibersihkan.</p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Keranjang</span>
                    <span class="badge bg-primary rounded-pill">{{$jumlah}}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($keranjangs as $keranjang)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{$keranjang->nama_layanan}}</h6>
                            <small class="text-muted">{{$keranjang->nama_barang}}</small>
                        </div>
                        <span class="text-muted">Rp {{number_format($keranjang->harga,0,',','.')}}
                            <a href="/dKeranjang/{{$keranjang->id}}" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Ini?')" class="badge text-bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                              </svg>
                        </a>
                    </span>
                    </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Kode Voucher</h6>
                            <small>
                                @if ($vocher != '0')
                                    {{$vocher->kode_vocher}}
                                @else
                                    -
                                @endif
                            </small>
                        </div>
                        <span class="text-success">−Rp
                            @if ($pesanan != '0')
                                {{$pesanan->diskon}}
                            @else
                                0
                            @endif
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>Rp {{number_format($total,0,',','.')}}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Bayar</span>
                        @if ($pesanan != '0')
                        @php
                            $diskon = $total * ($vocher->diskon_persen / 100);
                            $diskonHasil = $total - $diskon;
                        @endphp
                            <strong>Rp {{number_format($diskonHasil,0,',','.')}}</strong>
                        @else
                            <strong>Rp {{number_format($total,0,',','.')}}</strong>
                        @endif
                    </li>
                </ul>

                <form class="card p-2" action="/cekVocherUser" method="POST">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}">
                    @if ($pesanan != '0')
                        <input type="hidden" name="idPesanan" value="{{$pesanan->id}}">
                    @else
                        <input type="hidden" name="idPesanan" value="0">
                    @endif
                    <div class="input-group">
                        <input type="text" class="form-control" name="vocher" placeholder="Kode Voucher">
                        <button type="submit" class="btn btn-secondary">Gunakan Voucher</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <form class="needs-validation" novalidate="" action="/keranjangUser" method="POST">
                    @csrf
                    <h4>Pilih Layanan</h4>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="country" class="form-label">Layanan</label>
                            <select class="js-example-basic-single" name="layanan" style="width: 100%;">
                                @foreach ($layanans as $layanan)
                                <option value="{{$layanan->id}}">[{{$layanan->kategori}}] {{$layanan->nama_layanan}} - Rp. {{number_format($layanan->harga,0,',','.')}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Layanan wajib diisi.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Nama Sepatu</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="inputShoesname" placeholder="Nama Sepatu" name="barang" required>
                                <div class="invalid-feedback">
                                    Nama sepatu wajib diisi.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Deskripsi Barang (isi bila ada permintaan khusus)</label>
                            <div class="input-group has-validation">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
                                <div class="invalid-feedback">
                                    Nama sepatu wajib diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">Tambah Ke Keranjang</button>
                        </div>
                    </div>
                </form>

                    <hr class="my-4">

                    <form action="/prosesPesananUser" method="post">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}">
                    @if ($pesanan != '0')
                        <input type="hidden" name="idPesanan" value="{{$pesanan->id}}">
                    @else
                        <input type="hidden" name="idPesanan" value="0">
                    @endif
                    @if ($pemesan != '0')
                        <input type="hidden" name="idPemesan" value="{{$pemesan->id}}">
                    @else
                        <input type="hidden" name="idPemesan" value="0">
                    @endif
                    @if ($vocher != '0')
                        <input type="hidden" name="idVocher" value="{{$vocher->id}}">
                    @endif
                    @if ($pesanan != '0')
                    @php
                            $diskon = $total * ($vocher->diskon_persen / 100);
                            $diskonHasil = $total - $diskon;
                    @endphp
                    <input type="hidden" name="nominal" value="{{$diskonHasil}}">
                    @else
                    <input type="hidden" name="nominal" value="{{$total}}">
                    @endif
                    <h4>Pilih Pengiriman</h4>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="country" class="form-label">Pengiriman Sepatu Setelah Di Laundry</label>
                            <select class="form-select" id="selectDelivery" name="tipe" placeholder="Pilih Pengantaran">
                                <option value="Diantar Sendiri">Diantar Sendiri</option>
                                <option value="Diambil Petugas Ke Rumah">Diambil Petugas Ke Rumah</option>
                            </select>
                            <div class="invalid-feedback">
                                Pengambilan Sepatu wajib diisi.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Alamat Pengiriman</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Isi Alamat" name="alamat">
                            <div class="invalid-feedback">
                                Alamat Pengiriman wajib diisi.
                            </div>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" name="cekAlamat" id="checkSameAddress">
                                <label class="form-check-label" for="same-address">Alamat pengiriman sama dengan alamat di profil saya</label>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">
                    @if ($total != '0')
                    <button type="submit" class="w-100 btn btn-primary btn-lg" onclick="return confirm('Apakah Sudah Semuanya?')">Lanjut Ke Pembayaran</button>
                    @else
                    <button class="w-100 btn btn-secondary btn-lg">Keranjang kamu kosong?!, Pesan terlebih dahulu!</button>
                    @endif
                    </form>
            </div>
        </div>
    </main>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection
