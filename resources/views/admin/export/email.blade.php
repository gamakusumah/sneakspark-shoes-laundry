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
            justify-content: space-between;
            align-items: start;
            padding: 8px 0;
        }

        .text-secondary {
            color: #6c757d;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
        }

        .thanks {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 48px;
            margin-bottom: 24px;
        }
    </style>
</head>

<body>
    <div>
        <p>Dear <b>[Nama Pelanggan]</b></p>

        <p>Terima kasih telah mempercayakan perawatan sepatu Anda kepada kami di <b>Sneakspark Shoes Laundry</b>. Kami ingin memberitahukan bahwa sepatu Anda telah selesai dicuci dan siap untuk diambil.</p>
        <p>Kami telah memastikan setiap detail perawatan dilakukan dengan seksama, menggunakan bahan premium dan teknik terbaik untuk memastikan hasil yang maksimal. Kami berharap Anda puas dengan layanan yang kami berikan.</p>
        <p style="margin-top: 32px;">Berikut invoice detail pesanan :</p>
    </div>

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
                            <li class="list-item" style="font-size: 18px;"><b>John Doe</b></li>
                            <li class="list-item"><b>Invoice</b> #12345</li>
                            <li class="list-item">April 17 2021</li>
                        </ul>
                        <hr>
                    </div>
                    <div class="service-item">
                        <div>
                            <div style="margin-bottom: 4px;"><b>Layanan x1</b></div>
                            <div class="text-secondary">Adidas Samba</div>
                        </div>
                        <div>
                            <p>Rp80.000</p>
                        </div>
                    </div>
                    <hr>
                    <div style="margin: 16px 0;">
                        <div class="flex">
                            <div>Diskon</div>
                            <div>-Rp20.000</div>
                        </div>
                        <div class="flex">
                            <div>Total Pemesanan</div>
                            <div>Rp200.000</div>
                        </div>
                        <div class="flex">
                            <div>Total Bayar</div>
                            <div>Rp200.000</div>
                        </div>
                        <div class="flex">
                            <div>Kembalian</div>
                            <div>Rp0</div>
                        </div>
                    </div>
                    <hr style="border: 2px solid black; margin-top: 12px;">
                    <div class="thanks">
                        <span>Terima kasih</span>
                        <span>atas kepercayaan Anda</span>
                    </div>

                </div>
            </div>
        </div>
        <div style="margin-top: 32px;">
            <p>Anda dapat mengambil sepatu Anda di lokasi kami pada jam operasional atau menghubungi kami untuk layanan pengiriman ke alamat Anda.</p>
            <p>Jika ada pertanyaan atau kebutuhan lain, jangan ragu untuk menghubungi kami melalui <b>083872764001</b> atau <b>[Email Kontak]</b>. Kami selalu siap membantu Anda.</p>
            <p>Terima kasih atas kepercayaan Anda, dan kami berharap dapat terus melayani Anda dengan hasil terbaik!</p>

            <p style="margin-top: 32px; margin-bottom: 24px;">Salam hangat</p>
            <p>Sneakspark Laundry Shoes</p>
        </div>
    </body>

</html>
