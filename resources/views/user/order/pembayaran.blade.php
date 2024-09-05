@extends('user.layout.template')
@section('content')
<div class="mx-auto text-center mt-5" style="max-width: 420px;">
    <form>
        <img class="" src="/img/sneakspark-logo-black.png" alt="" width="150" height="150">
        <h1 class="h4 mb-5 mt-2 fw-bold">Selesaikan Pembayaran</h1>

        <div class="row justify-content-between">
            <div class="col-6 text-start fw-bold">
                Transfer Bank BCA
            </div>
            <div class="col-6 text-end">
                BCA
            </div>
        </div>
        <hr />

        <div class="row justify-content-between">
            <div class="col-6 text-start mb-2">
                <div>
                    Nomor Rekening
                </div>
                <div class="fw-bold">
                    3214567890
                </div>
            </div>
            <div class="col-6 text-end">
                <button class="btn text-success my-auto px-0 fw-bold">Salin</button>
            </div>
            <div class="col-6 text-start">
                <div>
                    Total Pembayaran
                </div>
                <div class="fw-bold">
                    Rp160.000
                </div>
            </div>
            <div class="col-6 text-end">
                <button class="btn text-success my-auto px-0 fw-bold">Salin</button>
            </div>
        </div>
        <hr />

        <div class="mb-4 text-start">
            <label for="formFile" class="form-label">Upload bukti pembayaran</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <hr />
        <button class="w-100 btn btn-lg btn-primary" type="submit">Bayar</button>
        <p class="mt-5 mb-3 text-muted">© 2024</p>
    </form>
</div>
@endsection
