<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur</title>
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
    <div class="card">
        <div>
            <div class="container">
                <div class="header">
                    <img class="d-block mx-auto" src="/img/sneakspark-logo-black.png" alt="" width="120" height="120">
                    <h5>Sneakspark Shoes Laundry</h5>
                    <p class="contact">Ig: @sneakspark_</p>
                </div>

                <div class="row mt-5">
                    <ul class="list">
                        <li class="list-item" style="font-size: 18px;"><b>{{$pemesan->nama}}</b></li>
                        <li class="list-item"><b>Invoice</b> #{{$pesanan->kode_pesanan}}</li>
                        <li class="list-item">{{$pesanan->created_at}}</li>
                    </ul>
                    <hr>
                </div>
                <table>
                    @foreach ($keranjangs as $keranjang)
                    <tr>
                        <td><b>{{$keranjang->nama_layanan}}</b></td>
                        <td align="right">Rp{{number_format($keranjang->harga,0,',','.')}}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary" style="padding-bottom: 8px">{{$keranjang->nama_barang}}</td>
                    </tr>
                    @endforeach
                </table>
                <hr>
                <div style="margin: 16px 0;">
                    <table>
                        <tr>
                            <td>Diskon</td>
                            <td align="right">-Rp{{$pesanan->diskon}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td align="right">Rp{{number_format($total,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td align="right">Rp {{number_format($pesanan->nominal,0,',','.')}}</td>
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
</body>

</html>
