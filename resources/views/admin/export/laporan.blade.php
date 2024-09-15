<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        p {
            margin: 0;
        }
        h2 {
            margin: 16px 0;
        }
    </style>
</head>

<body>
    <div>
        <div style="text-align: center; margin-bottom: 38px;">
            <h2>Laporan Pendapatan Sneakspark Shoes Laundry</h3>
            <p style="margin-bottom: 6px;">{{$priodeAwal}} - {{$priodeAkhir}}</p>
            <p>Dicetak Oleh : {{ auth('admin')->user()->nama }}</p>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Id Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Diskon</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayats as $riwayat)
                    <tr>
                        <td>{{$riwayat->kode_pesanan}}</td>
                        <td>{{$riwayat->created_at}}</td>
                        <td>{{$riwayat->nama}}</td>
                        <td>{{number_format($riwayat->total,0,',','.')}}</td>
                        <td>{{$riwayat->diskon}}</td>
                        <td>{{number_format($riwayat->nominal,0,',','.')}}</td>
                        <td>{{$riwayat->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="text-end">Total Pendapatan</th>
                        <th>Rp {{number_format($total,0,',','.')}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
