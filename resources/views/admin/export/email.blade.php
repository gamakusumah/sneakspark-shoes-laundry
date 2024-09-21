<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Email</title>
    <style>
        .card {
            width: 500px;
            border: 1px solid gainsboro;
            border-radius: 12px;
            padding: 2rem 0;
        }

        .container {
            width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 48px;
        }

        h5 {
            margin: 0;
            font-size: 16px;
        }

        .contact {
            margin: 0;
            margin-top: 6px;
        }

        .list {
            list-style: none;
            padding: 0;
        }

        .list-item {
            margin-bottom: 4px;
        }

        .service-item {
            display: flex;
            padding: 8px 0;
        }

        .text-secondary {
            color: #6c757d;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <div>
        <p>Dear <b>{{ $bioData->nama }}</b></p>

        <p>Terima kasih telah mempercayakan perawatan sepatu Anda kepada kami di <b>Sneakspark Shoes Laundry</b>. Kami
            ingin memberitahukan bahwa Status Pesanan Kamu <b>{{ $pesanan->status }}</b>.</p>
        <p>Kami telah memastikan setiap detail perawatan dilakukan dengan seksama, menggunakan bahan premium dan teknik
            terbaik untuk memastikan hasil yang maksimal. Kami berharap Anda puas dengan layanan yang kami berikan.</p>
        <p style="margin-top: 32px;">Berikut invoice detail pesanan :</p>
    </div>
    <div class="card">
        <div>
            <div class="container">
                <div class="header">
                    <img class="d-block mx-auto" src="/img/sneakspark-logo-black.png" alt="" width="120"
                        height="120">
                    <h5>Sneakspark Shoes Laundry</h5>
                    <p class="contact">Ig: @sneakspark_</p>
                </div>

                <div class="row mt-5">
                    <ul class="list">
                        <li class="list-item" style="font-size: 18px;"><b>{{ $bioData->nama }}</b></li>
                        <li class="list-item"><b>Invoice</b> #{{ $pesanan->kode_pesanan }}</li>
                        <li class="list-item">{{ $pesanan->created_at }}</li>
                    </ul>
                    <hr>
                </div>
                <table>
                    @foreach ($detailPesanans as $detail)
                        <tr>
                            <td><b>{{ $detail->nama_layanan }}</b></td>
                            <td align="right">Rp{{ number_format($detail->nominal, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="text-secondary" style="padding-bottom: 8px">{{ $detail->nama_barang }}</td>
                        </tr>
                    @endforeach
                </table>
                <hr>
                <div style="margin: 16px 0;">
                    <table>
                        <tr>
                            <td>Diskon</td>
                            <td align="right">-Rp{{ $pesanan->diskon }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td align="right">Rp{{ number_format($pesanan->total, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td align="right">Rp{{ number_format($pesanan->nominal, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
                <hr style="border: 2px solid black; margin-top: 12px;">
                <div style="text-align: center; margin: 32px 0;">
                    <div>Terima kasih</div>
                    <div>atas kepercayaan Anda</div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 32px;">
        <p>Jika ada pertanyaan atau kebutuhan lain, jangan ragu untuk menghubungi kami melalui <b>083872764001</b> atau
            <b>[Email Kontak]</b>. Kami selalu siap membantu Anda.
        </p>
        <p>Terima kasih atas kepercayaan Anda, dan kami berharap dapat terus melayani Anda dengan hasil terbaik!</p>

        <p style="margin-top: 32px; margin-bottom: 24px;">Salam hangat</p>
        <p>Sneakspark Laundry Shoes</p>
    </div>
</body>

</html>
