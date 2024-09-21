<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\KeranjangUser;
use App\Models\Vocher;
use App\Models\Pemesan;
use App\Models\Pesanan;
use App\Models\Layanan;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout()
    {
        $layanans = DB::table('layanans')
                ->join('kategoris', 'layanans.id_kategori', '=', 'kategoris.id')
                ->select('layanans.id', 'layanans.nama_layanan', 'layanans.harga', 'kategoris.nama as kategori', 'layanans.deskripsi')
                ->get();
        $keranjangs = DB::table('keranjang_users')
                ->join('layanans', 'keranjang_users.id_layanan', '=', 'layanans.id')
                ->select('keranjang_users.id', 'keranjang_users.nama_barang', 'layanans.nama_layanan', 'layanans.harga', 'keranjang_users.keterangan', 'keranjang_users.status', 'keranjang_users.id_user')
                ->where('keranjang_users.id_user', auth('web')->user()->id)
                ->get();
        $cekPemesan = Pemesan::where('id_user',  auth('web')->user()->id)
                ->where('status', 'Keranjang') // Kondisi tambahan
                ->first();
        if ($cekPemesan) {
            $cekPesanan = Pesanan::where('id_pemesan',  $cekPemesan->id)
                ->where('status', 'Keranjang') // Kondisi tambahan
                ->first();
            $vocher = Vocher::find($cekPesanan->id_vocher);
                return view('user.order.checkout', [
                    'title' => 'Pesan Layanan',
                    'active' => 'pesan-layanan',
                    'layanans' => $layanans,
                    'keranjangs' => $keranjangs,
                    'total' => $keranjangs->sum('harga'),
                    'jumlah' => $keranjangs->count(),
                    'pesanan' => $cekPesanan,
                    'vocher' => $vocher,
                    'pemesan' => $cekPemesan,
                ]);
        }
        return view('user.order.checkout', [
            'title' => 'Pesan Layanan',
            'active' => 'pesan-layanan',
            'layanans' => $layanans,
            'keranjangs' => $keranjangs,
            'total' => $keranjangs->sum('harga'),
            'jumlah' => $keranjangs->count(),
            'pesanan' => '0',
            'vocher' => '0',
            'pemesan' => '0',
        ]);
    }

    public function pembayaran($id)
    {
        return view('user.order.pembayaran', [
            'title' => 'Pembayaran',
            'active' => 'pembayaran',
            'pesanan' => Pesanan::find($id),
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
    public function stoareKeranjang(Request $request)
    {
        DB::table('keranjang_users')->insertOrIgnore([
            'id_user' => auth('web')->user()->id,
            'id_layanan' => $request->layanan,
            'nama_barang' => $request->barang,
            'keterangan' => $request->keterangan,
            'status' => 'Keranjang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pesan')->with('Notification', 'Data Berhasil Ditambahkan!');
    }

    public function pembayaranUser(Request $request)
    {
         // Validasi data
        $validator = Validator::make($request->all(), [
            'bukti' => 'required|mimes:png,jpg,jpeg|file|max:2048', // Ukuran maksimal 2048KB = 2MB
        ]);

        // Jika validasi gagal, redirect dengan pesan notifikasi
        if ($validator->fails()) {
            return redirect()->route('pembayaran', ['id' => $request->idPesanan])
                            ->withErrors($validator)
                            ->withInput()
                            ->with('Notification', 'File terlalu besar, maksimal file 2MB');
        }

        DB::table('pembayarans')->insertOrIgnore([
            'id_pesanan' => $request->idPesanan,
            'nominal' => $request->nominal,
            'bukti' => $validationData['bukti'] = $request->file('bukti')->store('bukti-pembayaran', 'public'),
            'status' => 'Menunggu Konfirmasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pesanans')
            ->where('id', $request->idPemesan)
            ->update([
                'status' => 'Menunggu Konfirmasi',
                'updated_at' => now(),
            ]);

        DB::table('pemesans')
            ->where('id', $request->idPemesan)
            ->update([
                'status' => 'Menunggu Konfirmasi',
                'updated_at' => now(),
            ]);

        return redirect()->route('riwayat')->with('Notification', 'Pembayaran Berhasil, Tunggu Konfirmasi Petugas!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Complex Logic.
     */
    public function cekVocher(Request $request)
    {
        $inputVocher = $request->vocher;
        $harga = $request->total;

        $cekPesanan = $request->idPesanan;

        // Mengambil data dari tabel 'vocher' dengan kondisi 'where' berdasarkan nilai $inputVocher
        $vocherData = Vocher::where('kode_vocher', $inputVocher)->first();
        if (!$vocherData) {
            return redirect()->route('pesan')->with('Notification', 'Vocher Tidak Ditemukan!');
        }
        if ($vocherData->min_order > $harga) {
            return redirect()->route('pesan')->with('Notification', 'Minimal orader Kurang!');
        }

        if ($vocherData->status == 'Non-Aktif') {
            return redirect()->route('pembayaranAdmin', ['id' => $request->idPemesan])->with('Notification', 'Vocher Sudah Tidak Berlaku!');
        }

        if ($vocherData->jumlah_pakai == '0') {
            return redirect()->route('pembayaranAdmin', ['id' => $request->idPemesan])->with('Notification', 'Vocher Sudah Habis!');
        }


        if ($cekPesanan == '0') {
            // Ambil ID terakhir dari tabel 'pemesans'
            $lastId = DB::table('pemesans')->latest('id')->value('id') ?? 0;
            // Tentukan nomor urut baru
            $newOrderNumber = $lastId + 1;

            // Buat kode acak, misalnya 4 karakter alfanumerik
            $randomCode = Str::upper(Str::random(4));

            // Gabungkan menjadi format 'SNP-kode-random-no_urut'
            $kodePesanan = "SNP-{$randomCode}-0{$newOrderNumber}";

            $nilaiDiskon = $harga * ($vocherData->diskon_persen / 100);

            $hasil = $harga - $nilaiDiskon;

            DB::table('pemesans')->insertOrIgnore([
                'id_user' => auth('web')->user()->id,
                'kode_pesanan' => $kodePesanan,
                'nama' => auth('web')->user()->name,
                'no_tlp' => auth('web')->user()->no_tlp,
                'email' => auth('web')->user()->email,
                'alamat' => auth('web')->user()->alamat,
                'status' => 'Keranjang',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('pesanans')->insertOrIgnore([
                'id_pemesan' => $newOrderNumber,
                'kode_pesanan' => $kodePesanan,
                'total' => $harga,
                'id_vocher' => $vocherData->id,
                'diskon' => $vocherData->diskon_persen,
                'nominal' => $hasil,
                'tipe_pengiriman' => '0',
                'status' => 'Keranjang',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('pesan')->with('Notification', 'Vocher Berhasil diclaim!');
    }

    public function prosesPesanan(Request $request)
    {
        $harga = $request->total;

        $cekPesanan = $request->idPesanan;

        if ($cekPesanan == '0') {
            // Ambil ID terakhir dari tabel 'pemesans'
            $lastId = DB::table('pemesans')->latest('id')->value('id') ?? 0;
            // Tentukan nomor urut baru
            $newOrderNumber = $lastId + 1;

            // Buat kode acak, misalnya 4 karakter alfanumerik
            $randomCode = Str::upper(Str::random(4));

            // Gabungkan menjadi format 'SNP-kode-random-no_urut'
            $kodePesanan = "SNP-{$randomCode}-0{$newOrderNumber}";

            // Memeriksa apakah checkbox cekAlamat tercentang
            if ($request->has('cekAlamat')) {
                // Jika tercentang, logika berhasil
                if (auth('web')->user()->alamat == null) {
                    return redirect()->route('pesan')->with('Notification', 'Alamat kamu masih belum tersimpan di data kami, isi manual!');
                }
                DB::table('pemesans')->insertOrIgnore([
                    'id_user' => auth('web')->user()->id,
                    'kode_pesanan' => $kodePesanan,
                    'nama' => auth('web')->user()->name,
                    'no_tlp' => auth('web')->user()->no_tlp,
                    'email' => auth('web')->user()->email,
                    'alamat' => auth('web')->user()->alamat,
                    'status' => 'Pembayaran',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                if ($request->alamat == null) {
                    return redirect()->route('pesan')->with('Notification', 'Alamat wajib diisi!');
                }
                // Jika tidak tercentang, logika gagal
                DB::table('pemesans')->insertOrIgnore([
                    'id_user' => auth('web')->user()->id,
                    'kode_pesanan' => $kodePesanan,
                    'nama' => auth('web')->user()->name,
                    'no_tlp' => auth('web')->user()->no_tlp,
                    'email' => auth('web')->user()->email,
                    'alamat' => $request->alamat,
                    'status' => 'Pembayaran',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $lastRecordPemesan = Pemesan::latest()->first();
            DB::table('pesanans')->insertOrIgnore([
                'id_pemesan' => $lastRecordPemesan->id,
                'kode_pesanan' => $kodePesanan,
                'total' => $harga,
                'id_vocher' => '0',
                'diskon' => '0',
                'nominal' => $harga,
                'tipe_pengiriman' => $request->tipe,
                'status' => 'Pembayaran',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $lastPesanan = Pesanan::latest()->first();

            $dataKeranjang = KeranjangUser::where('id_user', auth('web')->user()->id)->get();

            // Menghitung jumlah data yang ditemukan
            $jumlahData = $dataKeranjang->count();

            for ($i=0; $i < $jumlahData; $i++) {
                $hargaLayanan = Layanan::where('id', $dataKeranjang[$i]->id_layanan)->first();
                DB::table('detail_pesanans')->insertOrIgnore([
                    'id_pesanan' => $lastPesanan->id,
                    'id_layanan' => $dataKeranjang[$i]->id_layanan,
                    'nama_barang' => $dataKeranjang[$i]->nama_barang,
                    'keterangan' => $dataKeranjang[$i]->keterangan,
                    'nominal' => $hargaLayanan->harga,
                    'status' => 'Selesai',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                KeranjangUser::destroy($dataKeranjang[$i]->id);
            }
            return redirect()->route('pembayaran', ['id' => $lastPesanan->id])->with('Notification', 'Pesanan Berhasil Dibuat, Silahkan Lakukan Pembayaran!');
        }

        if ($cekPesanan != '0') {
            // $pemesanData = Pemesan::where('id_user', auth('web')->user()->id)
            //         ->where('status', 'Keranjang') // Kondisi tambahan
            //         ->first();

            // Memeriksa apakah checkbox cekAlamat tercentang
            if ($request->has('cekAlamat')) {
                // Jika tercentang, logika berhasil
                if (auth('web')->user()->alamat == null) {
                    return redirect()->route('pesan')->with('Notification', 'Alamat kamu masih belum tersimpan di data kami, isi manual!');
                }
                DB::table('pemesans')
                        ->where('id', $request->idPemesan)
                        ->update([
                            'status' => 'Pembayaran',
                            'updated_at' => now(),
                        ]);
            } else {
                if ($request->alamat == null) {
                    return redirect()->route('pesan')->with('Notification', 'Alamat wajib diisi!');
                }
                // Jika tidak tercentang, logika gagal
                DB::table('pemesans')
                        ->where('id', $request->idPemesan)
                        ->update([
                            'alamat' => $request->alamat,
                            'status' => 'Pembayaran',
                            'updated_at' => now(),
                        ]);
            }
            DB::table('pesanans')
            ->where('id', $request->idPesanan)
            ->update([
                'tipe_pengiriman' => $request->tipe,
                'nominal' => $request->nominal,
                'status' => 'Pembayaran',
                'updated_at' => now(),
            ]);
            $dataKeranjang = KeranjangUser::where('id_user', auth('web')->user()->id)->get();

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
                KeranjangUser::destroy($dataKeranjang[$i]->id);
            }


            $vocher = Vocher::where('id', $request->idVocher)->first();
            $penguranganVocher = $vocher->jumlah_pakai - 1;
            DB::table('vochers')
            ->where('id', $request->idVocher)
            ->update([
                'jumlah_pakai' => $penguranganVocher,
                'updated_at' => now(),
            ]);
            return redirect()->route('pembayaran', ['id' => $request->idPesanan])->with('Notification', 'Pesanan Berhasil Dibuat, Silahkan Lakukan Pembayaran!');
        }

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
    public function destroyKeranjang(string $id)
    {
        KeranjangUser::destroy($id);
        return redirect()->route('pesan')->with('Notification', 'Pesanan Berhasil Dihapus!');
    }
}
