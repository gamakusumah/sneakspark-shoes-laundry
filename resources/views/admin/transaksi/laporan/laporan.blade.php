@extends('admin.layout.template')
@section('content')
<div class="card p-4 mt-5 mb-3">
    <h5>Filter Data</h5>
    <div class="d-flex flex-column gap-4 flex-md-row align-items-md-end">
        <form>
            <div class="row">
                <div class="col">
                    <div>
                        <label for="startDate" class="form-label">Mulai Dari</label>
                        <input type="datetime-local" class="form-control" id="startDate">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="endDate" class="form-label">Sampai</label>
                        <input type="datetime-local" class="form-control" id="endDate">
                    </div>
                </div>
            </div>
        </form>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-success d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                    <path fill="#ffffff" d="M14 2H6a2 2 0 0 0-2 2v16c0 1.11.89 2 2 2h12c1.11 0 2-.89 2-2V8zm4 18H6V4h7v5h5zm-5.1-5.5l2.9 4.5H14l-2-3.4l-2 3.4H8.2l2.9-4.5L8.2 10H10l2 3.4l2-3.4h1.8z" />
                </svg>
                Export Data Ke Excel
            </button>
            <button class="btn btn-danger d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 32 32">
                    <path fill="#ffffff" d="M30 18v-2h-6v10h2v-4h3v-2h-3v-2zm-11 8h-4V16h4a3.003 3.003 0 0 1 3 3v4a3.003 3.003 0 0 1-3 3m-2-2h2a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2zm-6-8H6v10h2v-3h3a2.003 2.003 0 0 0 2-2v-3a2 2 0 0 0-2-2m-3 5v-3h3l.001 3z" />
                    <path fill="#ffffff" d="M22 14v-4a.91.91 0 0 0-.3-.7l-7-7A.9.9 0 0 0 14 2H4a2.006 2.006 0 0 0-2 2v24a2 2 0 0 0 2 2h16v-2H4V4h8v6a2.006 2.006 0 0 0 2 2h6v2Zm-8-4V4.4l5.6 5.6Z" />
                </svg>
                Print PDF
            </button>
        </div>
    </div>
</div>
<div class="card mb-4 p-4">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Id Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Pelanggan</th>
                <th>Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TR00001</td>
                <td>1 Juli 2024</td>
                <td>Gama Kusumah</td>
                <td>Rp180.000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Pendapatan</th>
                <th>Rp180.000</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
