@extends('admin.layout.template')
@section('content')
<div>
    <p>Dear <b>[Nama Pelanggan]</b></p>

    <p>Terima kasih telah mempercayakan perawatan sepatu Anda kepada kami di <b>Sneakspark Shoes Laundry</b>. Kami ingin memberitahukan bahwa sepatu Anda telah selesai dicuci dan siap untuk diambil.</p>
    <p>Kami telah memastikan setiap detail perawatan dilakukan dengan seksama, menggunakan bahan premium dan teknik terbaik untuk memastikan hasil yang maksimal. Kami berharap Anda puas dengan layanan yang kami berikan.</p>
    <p class="mt-5">Berikut invoice detail pesanan :</p>
</div>
<div class="card" style="width: 500px;">
    <div class="card-body mx-4">
        <div class="container">
            <div class="text-center">
                <img class="d-block mx-auto" src="/img/sneakspark-logo-black.png" alt="" width="120" height="120">
                <h5>Sneakspark Shoes Laundry</h5>
                <p>Ig: @sneakspark_</p>
            </div>

            <div class="row mt-5">
                <ul class="list-unstyled">
                    <li class="text-black fw-bold">John Doe</li>
                    <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
                    <li class="text-black mt-1">April 17 2021</li>
                </ul>
                <hr>
            </div>
            <div class="row">
                <div class="col-xl-10 mb-3">
                    <div class="fw-bold">Layanan x1</div>
                    <div class="text-secondary">Nama Sepatu</div>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">Rp80.000</p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-xl-10 mb-3">
                    <div class="fw-bold">Layanan x1</div>
                    <div class="text-secondary">Nama Sepatu</div>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">Rp80.000</p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-xl-10 mb-3">
                    <div class="fw-bold">Layanan x1</div>
                    <div class="text-secondary">Nama Sepatu</div>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">Rp80.000</p>
                </div>
                <hr>
            </div>
            <div class="row text-black">

                <div class="col-xl-12">
                    <p class="float-end fw-bold">Total Pembayaran : Rp240.000</p>
                </div>
                <hr style="border: 2px solid black;">
            </div>
            <div class="text-center" style="margin-top: 90px;">
                <p class="my-5 text-center lead">Terima kasih</p>
            </div>

        </div>
    </div>
</div>
<div class="mt-5">
    <p>Anda dapat mengambil sepatu Anda di lokasi kami pada jam operasional atau menghubungi kami untuk layanan pengiriman ke alamat Anda.</p>
    <p>Jika ada pertanyaan atau kebutuhan lain, jangan ragu untuk menghubungi kami melalui <b>083872764001</b> atau <b>[Email Kontak]</b>. Kami selalu siap membantu Anda.</p>
    <p>Terima kasih atas kepercayaan Anda, dan kami berharap dapat terus melayani Anda dengan hasil terbaik!</p>

    <p class="mt-5 mb-3">Salam hangat</p>
    <p>Sneakspark Laundry Shoes</p>
</div>

<!-- Laporan -->

<div>
    <div class="text-center mb-4">
        <h3>Laporan Pemasukan Sneakspark Shoes Laundry</h3>
        <p>22 Februari 2024 - 17 Mei 2024</p>
    </div>

    <div>
        <table class="">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Id Pesanan</th>
                    <th>Layanan</th>
                    <th>Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>22 Februari 2024</td>
                    <td>John Doe</td>
                    <td>Nama Sepatu</td>
                    <td>Rp80.000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>22 Februari 2024</td>
                    <td>John Doe</td>
                    <td>Nama Sepatu</td>
                    <td>Rp80.000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>22 Februari 2024</td>
                    <td>John Doe</td>
                    <td>Nama Sepatu</td>
                    <td>Rp80.000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total Pemasukan</th>
                    <th>Rp240.000</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
