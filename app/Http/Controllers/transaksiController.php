<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Models\Pemesan;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPesanan()
    {
        return view('admin.transaksi.pesanan.pesanan', [
            'title' => 'Pesanan',
            'active' => 'pesanan'
        ]);
    }

    public function tambahPesanan()
    {
        // Ambil ID terakhir dari tabel 'pemesans'
        $lastId = DB::table('pemesans')->latest('id')->value('id') ?? 0;
        // Tentukan nomor urut baru
        $newOrderNumber = $lastId + 1;

        // Buat kode acak, misalnya 4 karakter alfanumerik
        $randomCode = Str::upper(Str::random(4));

        // Gabungkan menjadi format 'SNP-kode-random-no_urut'
        $kodePesanan = "SNP-{$randomCode}-0{$newOrderNumber}";

        DB::table('pemesans')->insertOrIgnore([
            'kode_pesanan' => $kodePesanan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mengambil nilai ID terakhir dari tabel 'pemesans'
        $currentId = DB::table('pemesans')->latest('id')->value('id');
        
        return redirect()->route('showPesanan', ['id' => $currentId])->with('Notification', 'Pesanan Berhasil Dibuat! Silahkan isi Detail Pesanan!');
    }
    
    public function showPesanan($id)
    {      
        return view('admin.transaksi.pesanan.tambahPesanan', [
            'title' => 'Tambah Pesanan',
            'active' => 'tambah-pesanan',
            'pemesan' => Pemesan::find($id),
        ]);
    }

    public function indexUbahPesanan()
    {
        return view('admin.transaksi.pesanan.ubahPesanan', [
            'title' => 'Ubah Pesanan',
            'active' => 'ubah-pesanan'
        ]);
    }

    public function fakturPesanan()
    {
        return view('admin.transaksi.pesanan.faktur', [
            'title' => 'Faktur',
            'active' => 'faktur'
        ]);
    }

    public function laporanPesanan()
    {
        return view('admin.transaksi.laporan.laporan', [
            'title' => 'Laporan Pesanan',
            'active' => 'laporan-pesanan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
