@extends('user.layout.template')
@section('content')
<div class="mx-auto mt-5 container">
    <h1 class="h3 mb-5 fw-normal text-center">Riwayat Pesanan</h1>

    @forelse ($pemesans as $pemesan)
        @foreach ($pesanans as $pesanan)
            @if ($pesanan->id_pemesan == $pemesan->id)
                <div class="card p-4 mb-4">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row gap-2">
                            <div>{{$pesanan->created_at}}</div>
                            <div class="text-secondary">- {{$pesanan->kode_pesanan}}</div>
                        </div>
                        <span class="badge rounded-pill bg-success">{{$pesanan->status}}</span>
                    </div>
                    <hr />
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            @foreach ($details as $detail)
                                @if ($detail->id_pesanan == $pesanan->id)
                                    <div class="mb-2">
                                        <div class="fw-bold">
                                            @foreach ($layanans as $layanan)
                                                @if ($layanan->id == $detail->id_layanan)
                                                    {{$layanan->nama_layanan}}
                                                @endif
                                            @endforeach
                                            Rp {{number_format($detail->nominal,0,',','.')}}</div>
                                        <div class="text-secondary">{{$detail->nama_barang}}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center px-4 flex-column border-start">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>Rp {{number_format($pesanan->total,0,',','.')}}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Diskon</span>
                                <strong>Rp {{number_format($pesanan->diskon,0,',','.')}}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Bayar</span>
                                <strong>Rp {{number_format($pesanan->nominal,0,',','.')}}</strong>
                            </li>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @empty
        
    @endforelse

</div>
@endsection
