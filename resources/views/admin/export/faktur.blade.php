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
</body>

</html>
