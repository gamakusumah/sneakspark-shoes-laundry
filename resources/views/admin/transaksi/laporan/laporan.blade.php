@extends('admin.layout.template')
@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<div class="card mb-4 col-sm-12">
    <div class="card-body">
        {!! $chart->container() !!}
    </div>
</div>

<div class="card p-4 mt-5 mb-3">
    <h5>Filter Data</h5>
    <form action="/search" method="POST">
        @csrf
    <div class="d-flex flex-column gap-4 flex-md-row align-items-md-end">
            <div class="row">
                <div class="col">
                    <div>
                        <label for="startDate" class="form-label">Mulai Dari</label>
                        <input type="date" class="form-control" name="mulai" id="startDate">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="endDate" class="form-label">Sampai</label>
                        <input type="date" class="form-control" name="sampai" id="endDate">
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-primary d-flex align-items-center gap-2" type="submit" name="aksi" value="cari">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                      </svg>
                      Cari Data
                </button>
                <button class="btn btn-success d-flex align-items-center gap-2" type="submit" name="aksi" value="excel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="#ffffff" d="M14 2H6a2 2 0 0 0-2 2v16c0 1.11.89 2 2 2h12c1.11 0 2-.89 2-2V8zm4 18H6V4h7v5h5zm-5.1-5.5l2.9 4.5H14l-2-3.4l-2 3.4H8.2l2.9-4.5L8.2 10H10l2 3.4l2-3.4h1.8z" />
                    </svg>
                    Export Data Ke Excel
                </button>
                <button class="btn btn-danger d-flex align-items-center gap-2" type="submit" name="aksi" value="pdf">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 32 32">
                        <path fill="#ffffff" d="M30 18v-2h-6v10h2v-4h3v-2h-3v-2zm-11 8h-4V16h4a3.003 3.003 0 0 1 3 3v4a3.003 3.003 0 0 1-3 3m-2-2h2a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2zm-6-8H6v10h2v-3h3a2.003 2.003 0 0 0 2-2v-3a2 2 0 0 0-2-2m-3 5v-3h3l.001 3z" />
                        <path fill="#ffffff" d="M22 14v-4a.91.91 0 0 0-.3-.7l-7-7A.9.9 0 0 0 14 2H4a2.006 2.006 0 0 0-2 2v24a2 2 0 0 0 2 2h16v-2H4V4h8v6a2.006 2.006 0 0 0 2 2h6v2Zm-8-4V4.4l5.6 5.6Z" />
                    </svg>
                    Print PDF
                </button>
            </div>
        </div>
    </form>
</div>
<div class="card mb-4 p-4">
    <table id="datatablesSimple">
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
    </table>
</div>

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endsection
