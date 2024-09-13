@extends('user.layout.template')
@section('content')
<div class="mx-auto mt-5 container">
    <h1 class="h3 mb-5 fw-normal text-center">Riwayat Pesanan</h1>

    <div class="card p-4 mb-4">
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-row gap-2">
                <div>07 Juli 2024</div>
                <div class="text-secondary">- Id Transaksi</div>
            </div>
            <span class="badge rounded-pill bg-success">Selesai</span>
        </div>
        <hr />
        <div class="d-flex flex-row justify-content-between">
            <div>
                <div class="mb-2">
                    <div class="fw-bold">Layanan 1 Rp80.000</div>
                    <div class="text-secondary">Adidas Samba</div>
                </div>
                <div class="mb-2">
                    <div class="fw-bold">Layanan 2 Rp160.000</div>
                    <div class="text-secondary">Nike Air Jordan</div>
                </div>
            </div>
            <div class="d-flex justify-content-center px-4 flex-column border-start">
                <div>Total</div>
                <div class="fw-bold">Rp160.000</div>
            </div>
        </div>
    </div>
    <div class="card p-4 mb-4">
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-row gap-2">
                <div>07 Juli 2024</div>
                <div class="text-secondary">- Id Transaksi</div>
            </div>
            <span class="badge rounded-pill bg-success">Selesai</span>
        </div>
        <hr />
        <div class="d-flex flex-row justify-content-between">
            <div>
                <div class="mb-2">
                    <div class="fw-bold">Layanan 1 Rp80.000</div>
                    <div class="text-secondary">Adidas Samba</div>
                </div>
                <div class="mb-2">
                    <div class="fw-bold">Layanan 2 Rp160.000</div>
                    <div class="text-secondary">Nike Air Jordan</div>
                </div>
            </div>
            <div class="d-flex justify-content-center px-4 flex-column border-start">
                <div>Total</div>
                <div class="fw-bold">Rp160.000</div>
            </div>
        </div>
    </div>
</div>
@endsection
