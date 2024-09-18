@extends('admin.layout.template')
@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a href="/vocher">{{$title}}</a></li>
    <li class="breadcrumb-item active">{{ $vocher->kode_vocher }}</li>
</ol>


<div class="card p-4">
    <form action="/uVocher" method="POST">
        @csrf
        <input type="hidden" name="idVocher" value="{{$vocher->id}}">
        <div class="mb-3">
            <label for="inputName" class="form-label">Kode Vocher</label>
            <input type="text" class="form-control" id="inputName" name="kode" value="{{$vocher->kode_vocher}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Jumlah Pakai</label>
            <input type="number" class="form-control" id="inputPrice" name="jumlah" value="{{$vocher->jumlah_pakai}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Diskon (%)</label>
            <input type="number" class="form-control" id="inputPrice" name="diskon" value="{{$vocher->diskon_persen}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Minimal Order</label>
            <input type="number" class="form-control" id="inputPrice" name="minorder" value="{{$vocher->min_order}}">
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="inputDescription" rows="4" name="keterangan">{{$vocher->keterangan}}</textarea>
        </div>
        <div class="mb-3">
            <label for="selectPosition" class="form-label">Status</label>
            <select id="selectPosition" class="form-select" name="status">
                <option value="{{$vocher->status}}">{{$vocher->status}}</option>
                <option value="Aktif">Aktif</option>
                <option value="Non-Aktif">Non-Aktif</option>
            </select>
        </div>
        <a href="/vocher" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
