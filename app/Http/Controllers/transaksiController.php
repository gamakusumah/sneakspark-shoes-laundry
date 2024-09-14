<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Models\Pemesan;
use App\Models\Keranjang;
use App\Models\Vocher;
use App\Models\Pesanan;
use App\Models\Layanan;

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
        $layanans = DB::table('layanans')
                ->join('kategoris', 'layanans.id_kategori', '=', 'kategoris.id')
                ->select('layanans.id', 'layanans.nama_layanan', 'layanans.harga', 'kategoris.nama as kategori', 'layanans.deskripsi')
                ->get();
        $keranjangs = DB::table('keranjangs')
                ->join('layanans', 'keranjangs.id_layanan', '=', 'layanans.id')
                ->select('keranjangs.id', 'keranjangs.nama_barang', 'layanans.nama_layanan', 'layanans.harga', 'keranjangs.keterangan', 'keranjangs.status', 'keranjangs.id_pemesan')
                ->where('keranjangs.id_pemesan', $id)
                ->get();
        return view('admin.transaksi.pesanan.tambahPesanan', [
            'title' => 'Tambah Pesanan',
            'active' => 'tambah-pesanan',
            'pemesan' => Pemesan::find($id),
            'layanans' => $layanans,
            'keranjangs' => $keranjangs,
            'total' => $keranjangs->sum('harga'),
        ]);
    }
    
    public function showPembayaran($id)
    {   
        $layanans = DB::table('layanans')
                ->join('kategoris', 'layanans.id_kategori', '=', 'kategoris.id')
                ->select('layanans.id', 'layanans.nama_layanan', 'layanans.harga', 'kategoris.nama as kategori', 'layanans.deskripsi')
                ->get();
        $keranjangs = DB::table('keranjangs')
                ->join('layanans', 'keranjangs.id_layanan', '=', 'layanans.id')
                ->select('keranjangs.id', 'keranjangs.nama_barang', 'layanans.nama_layanan', 'layanans.harga', 'keranjangs.keterangan', 'keranjangs.status', 'keranjangs.id_pemesan')
                ->where('keranjangs.id_pemesan', $id)
                ->get();
        return view('admin.transaksi.pesanan.pembayaran', [
            'title' => 'Checkout Pesanan',
            'active' => 'checkout-pesanan',
            'pemesan' => Pemesan::find($id),
            'keranjangs' => $keranjangs,
            'total' => $keranjangs->sum('harga'),
            'pesanan' => Pesanan::where('id_pemesan', $id)->first(),
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
    public function storeKeranjang(Request $request)
    {
        DB::table('keranjangs')->insertOrIgnore([
            'id_pemesan' => $request->idPemesan,
            'id_layanan' => $request->layanan,
            'nama_barang' => $request->sepatu,
            'keterangan' => $request->keterangan,
            'status' => 'Keranjang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('showPesanan', ['id' => $request->idPemesan])->with('Notification', 'Data Berhasil Ditambahkan!');
    }
    
    /**
     * Proses Complex
     */
    public function prosesPesanan(Request $request)
    {
        DB::table('pemesans')
            ->where('id', $request->idPemesan)
            ->update([
                'nama' => $request->nama,
                'no_tlp' => $request->noTlp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'updated_at' => now(),
            ]);
        DB::table('pesanans')->insertOrIgnore([
                'id_pemesan' => $request->idPemesan,
                'kode_pesanan' => $request->kodePesanan,
                'total' => $request->total,
                'id_vocher' => '0',
                'diskon' => '0',
                'nominal' => $request->total,
                'tipe_pengiriman' => $request->tipe,
                'status' => 'Keranjang',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        return redirect()->route('showPembayaran', ['id' => $request->idPemesan])->with('Notification', 'Pesanan Berhasil Dibuat!');
    }
    
    public function cekVocher(Request $request)
    {
        $inputVocher = $request->kode;
        $harga = $request->total;

        // Mengambil data dari tabel 'vocher' dengan kondisi 'where' berdasarkan nilai $inputVocher
        $vocherData = Vocher::where('kode_vocher', $inputVocher)->first();
        if (!$vocherData) {
            return redirect()->route('showPembayaran', ['id' => $request->idPemesan])->with('Notification', 'Vocher Tidak Ditemukan!');
        }
        
        if ($vocherData->min_order >= $harga) {
            return redirect()->route('showPembayaran', ['id' => $request->idPemesan])->with('Notification', 'Minimal orader Kurang!');
        }

        $nilaiDiskon = $harga * ($vocherData->diskon_persen / 100);

        $hasil = $harga - $nilaiDiskon;
        
        DB::table('pesanans')
            ->where('id', $request->idPesanan)
            ->update([
                'id_vocher' => $vocherData->id,
                'diskon' => $vocherData->diskon_persen,
                'nominal' => $hasil,
                'updated_at' => now(),
            ]);
        return redirect()->route('showPembayaran', ['id' => $request->idPemesan])->with('Notification', 'Vocher Berhasil Didapatkan!');

    }
    
    public function strukAdmin(Request $request)
    {
        $idPemesan = $request->idPemesan;
        DB::table('pesanans')
            ->where('id', $request->idPesanan)
            ->update([
                'status' => 'Proses',
                'updated_at' => now(),
            ]);
        
        $dataPesanan = Pesanan::where('id', $request->idPesanan)->first();
        
        if ($dataPesanan->id_vocher != '0') {
            $vocher = Vocher::where('id', $dataPesanan->id_vocher)->first();
            $penguranganVocher = $vocher->jumlah_pakai - 1;
            DB::table('vochers')
            ->where('id', $dataPesanan->id_vocher)
            ->update([
                'jumlah_pakai' => $penguranganVocher,
                'updated_at' => now(),
            ]);
        }

        $dataKeranjang = Keranjang::where('id_pemesan', $idPemesan)->get();

        // Menghitung jumlah data yang ditemukan
        $jumlahData = $dataKeranjang->count();

        for ($i=0; $i < $jumlahData; $i++) { 
            $hargaLayanan = Layanan::where('id', $dataKeranjang[$i]->id_layanan)->first();
            DB::table('detail_pesanans')->insertOrIgnore([
                'id_pesanan' => $request->idPesanan,
                'id_layanan' => $dataKeranjang[$i]->id_layanan,
                'nama_barang' => $dataKeranjang[$i]->nama_barang,
                'keterangan' => $dataKeranjang[$i]->keterangan,
                'nominal' => $hargaLayanan->harga,
                'status' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            Keranjang::destroy($dataKeranjang[$i]->id);
        }

        return redirect()->route('pesanan')->with('Notification', 'Pesanan Berhasil Dibuat');
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
    public function destroyKeranjang(string $id, $idPemesan)
    {
        Keranjang::destroy($id);
        return redirect()->route('showPesanan', ['id' => $idPemesan])->with('Notification', 'Data Berhasil Dihapus!');
    }
}
