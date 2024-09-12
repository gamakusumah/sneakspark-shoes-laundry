@extends('admin.layout.template')
@section('content')
<div class="row gap-2">
    <div class="col p-0">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Pendapatan Hari Ini</h5>
                <h3 class="mt-3 mb-3">Rp362.540</h3>
                <p class="mb-0 text-muted">
                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div>
    </div>
    <div class="col p-0">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Pendapatan Bulan Ini</h5>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0 text-muted">
                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div>
    </div>

    <!-- Force next columns to break to new line -->
    <div class="w-100"></div>

    <div class="col p-0">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Pelanggan</h5>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0 text-muted">
                    <span class="text-nowrap">Jumlah Total Pelanggan</span>
                </p>
            </div> <!-- end card-body-->
        </div>
    </div>
    <div class="col p-0">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Pendapatan</h5>
                <h3 class="mt-3 mb-3">Rp36.254.000</h3>
                <p class="mb-0 text-muted">
                    <span class="text-nowrap">Jumlah total pendapatan</span>
                </p>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection
