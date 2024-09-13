@extends('admin.layout.template')
@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. Handphone</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>No. Handphone</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{$pelanggan->name}}</td>
                    <td>{{$pelanggan->no_tlp}}</td>
                    <td>{{$pelanggan->email}}</td>
                    <td>{{$pelanggan->alamat}}</td>
                    <td>
                        <a href="/detailPelanggan/{{$pelanggan->id}}" class="btn btn-outline-success btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
