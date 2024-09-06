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
                    <span class="badge bg-primary rounded-pill">2</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Layanan 1</h6>
                            <small class="text-muted">Adidas Samba</small>
                        </div>
                        <span class="text-muted">Rp80.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Layanan 2</h6>
                            <small class="text-muted">Nike Air Jordan</small>
                        </div>
                        <span class="text-muted">Rp100.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">−Rp20.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>Rp160.000</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <form class="needs-validation" novalidate="">
                    <h4>Pilih Layanan</h4>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="country" class="form-label">Layanan</label>
                            <select class="form-select" id="selectService" required="" placeholder="Pilih Layanan">
                                <option value="1">Layanan 1</option>
                                <option value="2">Layanan </option>
                            </select>
                            <div class="invalid-feedback">
                                Layanan wajib diisi.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Nama Sepatu</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="inputShoesname" placeholder="Adidas Samba" required="">
                                <div class="invalid-feedback">
                                    Nama sepatu wajib diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="button">Tambah Ke Keranjang</button>
                        </div>

                    </div>

                    <hr class="my-4">

                    <h4>Pilih Pengiriman</h4>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="country" class="form-label">Pengambilan Sepatu Sebelum Di Laundry</label>
                            <select class="form-select" id="selectPickup" required="" placeholder="Pilih Pengambilan">
                                <option value="1">Dikirim Sendiri</option>
                                <option value="2">Dijemput</option>
                            </select>
                            <div class="invalid-feedback">
                                Pengambilan Sepatu wajib diisi.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="country" class="form-label">Pengiriman Sepatu Setelah Di Laundry</label>
                            <select class="form-select" id="selectDelivery" required="" placeholder="Pilih Pengantaran">
                                <option value="1">Diambil Sendiri</option>
                                <option value="2">Dikirim</option>
                            </select>
                            <div class="invalid-feedback">
                                Pengambilan Sepatu wajib diisi.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Alamat Pengiriman</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Isi ALamat" required="">
                            <div class="invalid-feedback">
                                Alamat Pengiriman wajib diisi.
                            </div>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="checkSameAddress">
                                <label class="form-check-label" for="same-address">Alamat pengiriman sama dengan alamat di profil saya</label>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <h4>Pembayaran</h4>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="country" class="form-label">Metode Pembayaran</label>
                            <select class="form-select" id="selectPayment" required="" placeholder="Pilih Metode Pembayaran">
                                <option value="1">Transfer BCA</option>
                                <option value="1">Transfer BCA</option>
                                <option value="1">Transfer BCA</option>
                                <option value="2">Dijemput</option>
                            </select>
                            <div class="invalid-feedback">
                                Metode Pembayaran wajib diisi.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <a class="w-100 btn btn-primary btn-lg" href="/pembayaran" type="submit">Lanjut Ke Pembayaran</a>
                </form>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2024 Sneakspark Shoes Laundry</p>
    </footer>
</div>
@endsection
