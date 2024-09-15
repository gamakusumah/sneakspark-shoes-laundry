<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use App\Charts\PemasukanBulanan;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Dompdf\Dompdf;
use Dompdf\Options;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Pemesan;
use App\Models\Keranjang;
use App\Models\Vocher;
use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\Pembayaran;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPesanan()
    {
        $antrian = DB::table('pesanans')
                ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                ->select('pesanans.id', 'pemesans.kode_pesanan', 'pesanans.created_at', 'pemesans.nama', 'pesanans.status')
                ->where('pesanans.status', 'Menunggu Konfirmasi')
                ->get();
        return view('admin.transaksi.pesanan.pesanan', [
            'title' => 'Pesanan',
            'active' => 'Menunggu Konfirmasi',
            'antrians' => $antrian,
            'menunggu' => Pesanan::where('status', 'Menunggu Konfirmasi')->count(),
            'pengambilan' => Pesanan::where('status', 'Pengambilan')->count(),
            'proses' => Pesanan::where('status', 'Proses')->count(),
            'selesai' => Pesanan::where('status', 'Selesai')->count(),
        ]);
    }
    
    public function indexPesananKondisi($kondisi)
    {
        $antrian = DB::table('pesanans')
                ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                ->select('pesanans.id', 'pemesans.kode_pesanan', 'pesanans.created_at', 'pemesans.nama', 'pesanans.status')
                ->where('pesanans.status', $kondisi)
                ->get();
        return view('admin.transaksi.pesanan.pesanan', [
            'title' => $kondisi,
            'active' => $kondisi,
            'antrians' => $antrian,
            'menunggu' => Pesanan::where('status', 'Menunggu Konfirmasi')->count(),
            'pengambilan' => Pesanan::where('status', 'Pengambilan')->count(),
            'proses' => Pesanan::where('status', 'Proses')->count(),
            'selesai' => Pesanan::where('status', 'Selesai')->count(),
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
            'active' => 'ubah-pesanan',
        ]);
    }
    
    public function laporan(PemasukanBulanan $chart)
    {
        $riwayat = DB::table('pesanans')
                ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                ->select('pesanans.kode_pesanan', 'pesanans.created_at', 'pemesans.nama', 'pesanans.total', 'pesanans.diskon', 'pesanans.nominal', 'pesanans.status')
                ->whereIn('pesanans.status', ['Selesai', 'Proses', 'Pengambilan'])
                ->get();
        return view('admin.transaksi.laporan.laporan', [
            'title' => 'Laporan',
            'active' => 'laporan',
            'riwayats' => $riwayat,
            'chart' => $chart->build()
        ]);
    }
    
    public function fakturPesanan($id)
    {
        $keranjangs = DB::table('detail_pesanans')
                ->join('layanans', 'detail_pesanans.id_layanan', '=', 'layanans.id')
                ->select('detail_pesanans.id', 'detail_pesanans.nama_barang', 'layanans.nama_layanan', 'layanans.harga', 'detail_pesanans.keterangan', 'detail_pesanans.status', 'detail_pesanans.id_pesanan')
                ->where('detail_pesanans.id_pesanan', $id)
                ->get();
        $pesanan = Pesanan::where('id', $id)->first();
        return view('admin.export.faktur', [
            'title' => 'Laporan',
            'active' => 'laporan',
            'pemesan' => Pemesan::where('id', $pesanan->id_pemesan)->first(),
            'total' => $pesanan->nominal,
            'keranjangs' => $keranjangs,
            'pesanan' => $pesanan
        ]);
    }
    
    public function search(Request $request)
    {
        $action = $request->input('aksi');

        $dari = $request->mulai;
        $sampai = $request->sampai;

        if ($action == 'cari') {
            $riwayat = DB::table('pesanans')
                ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                ->select('pesanans.kode_pesanan', 'pesanans.created_at', 'pemesans.nama', 'pesanans.total', 'pesanans.diskon', 'pesanans.nominal', 'pesanans.status')
                ->whereIn('pesanans.status', ['Selesai', 'Proses', 'Pengambilan'])
                ->whereBetween('pesanans.created_at', [$dari, $sampai]) // Periode tanggal
                ->get();
            return view('admin.transaksi.laporan.laporan', [
                'title' => 'Laporan',
                'active' => 'laporan',
                'riwayats' => $riwayat,
            ]);
        }
        
        if ($action == 'excel') {
            $riwayats = DB::table('pesanans')
                ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                ->select('pesanans.kode_pesanan', 'pesanans.created_at', 'pemesans.nama', 'pesanans.total', 'pesanans.diskon', 'pesanans.nominal', 'pesanans.status')
                ->whereIn('pesanans.status', ['Selesai', 'Proses', 'Pengambilan'])
                ->whereBetween('pesanans.created_at', [$dari, $sampai]) // Periode tanggal
                ->get();

            // Inisialisasi objek Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header kolom
            $sheet->setCellValue('A1', 'Id Transaksi');
            $sheet->setCellValue('B1', 'Tanggal Transaksi');
            $sheet->setCellValue('C1', 'Pelanggan');
            $sheet->setCellValue('D1', 'Total');
            $sheet->setCellValue('E1', 'Diskon');
            $sheet->setCellValue('F1', 'Total Pembayaran');
            $sheet->setCellValue('G1', 'Status');

            // Menulis data pengguna ke sel-sel berikutnya
            $row = 2;
            foreach ($riwayats as $index => $riwayat) {
                $sheet->setCellValue('A' . $row, $riwayat->kode_pesanan);
                $sheet->setCellValue('B' . $row, $riwayat->created_at);
                $sheet->setCellValue('C' . $row, $riwayat->nama);
                $sheet->setCellValue('D' . $row, $riwayat->total);
                $sheet->setCellValue('E' . $row, $riwayat->diskon);
                $sheet->setCellValue('F' . $row, $riwayat->nominal);
                $sheet->setCellValue('G' . $row, $riwayat->status);
                $row++;
            }

            // Membuat objek Writer dan menyimpan spreadsheet ke file Excel
            $writer = new Xlsx($spreadsheet);
            $filename = 'Laporan' . time() . '.xlsx'; // Nama file Excel yang akan disimpan
            // Membuat response dan mengirimkan file Excel ke browser
            return Response::streamDownload(function () use ($writer) {
                $writer->save('php://output');
            }, $filename);
        }
        
        if ($action == 'pdf') {
            $riwayats = DB::table('pesanans')
                ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                ->select('pesanans.kode_pesanan', 'pesanans.created_at', 'pemesans.nama', 'pesanans.total', 'pesanans.diskon', 'pesanans.nominal', 'pesanans.status')
                ->whereIn('pesanans.status', ['Selesai', 'Proses', 'Pengambilan'])
                ->whereBetween('pesanans.created_at', [$dari, $sampai]) // Periode tanggal
                ->get();
            $totalNominal = $riwayats->sum('nominal');
            // Buat objek Dompdf baru
            $dompdf = new Dompdf();

            // Kemungkinan konfigurasi tambahan
            $options = new Options();
            $options->set('defaultPaperSize', 'A4');
            $dompdf->setOptions($options);

            // Render view menjadi HTML dengan data pengguna
            $html = view('admin.export.laporan', [
                'title' => 'Data Pemasukan',
                'riwayats' => $riwayats,
                'total' => $totalNominal,
                'priodeAwal' => $dari,
                'priodeAkhir' => $sampai,
            ])->render();

            // Muat HTML ke Dompdf
            $dompdf->loadHtml($html);

            // Render PDF
            $dompdf->render();

            return $dompdf->stream('Laporan Pemasukan ' . $dari . '-' . $sampai);
        }
    }
    
    public function pesananDetail($id)
    {
        $detailPesanan = DB::table('detail_pesanans')
                ->join('layanans', 'detail_pesanans.id_layanan', '=', 'layanans.id')
                ->select('layanans.nama_layanan', 'detail_pesanans.nama_barang', 'detail_pesanans.keterangan', 'detail_pesanans.nominal')
                ->where('detail_pesanans.id_pesanan', $id)
                ->get();
        $bioData = DB::table('pesanans')
                ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                ->select('pemesans.nama', 'pemesans.no_tlp', 'pemesans.email', 'pemesans.alamat', 'pesanans.tipe_pengiriman')
                ->where('pesanans.id', $id)
                ->first();
        return view('admin.transaksi.pesanan.detail', [
            'title' => 'Pesanan',
            'active' => 'pesanan',
            'pesanan' => Pesanan::find($id),
            'detailPesanans' => $detailPesanan,
            'bidata' => $bioData,
            'pembayaran' => Pembayaran::where('id_pesanan', $id)->first(),
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
    public function prosesPesananAdmin(Request $request)
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
        return redirect()->route('pembayaranAdmin', ['id' => $request->idPemesan])->with('Notification', 'Pesanan Berhasil Dibuat, Silahkan Lakukan Pembayaran!');
    }
    
    public function cekVocher(Request $request)
    {
        $inputVocher = $request->kode;
        $harga = $request->total;

        // Mengambil data dari tabel 'vocher' dengan kondisi 'where' berdasarkan nilai $inputVocher
        $vocherData = Vocher::where('kode_vocher', $inputVocher)->first();
        if (!$vocherData) {
            return redirect()->route('pembayaranAdmin', ['id' => $request->idPemesan])->with('Notification', 'Vocher Tidak Ditemukan!');
        }
        
        if ($vocherData->min_order >= $harga) {
            return redirect()->route('pembayaranAdmin', ['id' => $request->idPemesan])->with('Notification', 'Minimal orader Kurang!');
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
        return redirect()->route('pembayaranAdmin', ['id' => $request->idPemesan])->with('Notification', 'Vocher Berhasil Didapatkan!');

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
        

        return redirect()->route('struk', ['id' => $idPemesan])->with('Notification', 'Pesanan Berhasil Dibuat');
    }
    
    public function prosesTransaksi(Request $request)
    {
        DB::table('pesanans')
            ->where('id', $request->idPesanan)
            ->update([
                'status' => $request->status,
                'updated_at' => now(),
            ]);
        DB::table('pembayarans')
            ->where('id_pesanan', $request->idPesanan)
            ->update([
                'status' => $request->status,
                'updated_at' => now(),
            ]);
        
        // select data penting
        $detailPesanan = DB::table('detail_pesanans')
                ->join('layanans', 'detail_pesanans.id_layanan', '=', 'layanans.id')
                ->select('layanans.nama_layanan', 'detail_pesanans.nama_barang', 'detail_pesanans.keterangan', 'detail_pesanans.nominal')
                ->where('detail_pesanans.id_pesanan', $request->idPesanan)
                ->get();
        $bioData = DB::table('pesanans')
                    ->join('pemesans', 'pesanans.id_pemesan', '=', 'pemesans.id')
                    ->select('pemesans.nama', 'pemesans.no_tlp', 'pemesans.email', 'pemesans.alamat', 'pesanans.tipe_pengiriman')
                    ->where('pesanans.id', $request->idPesanan)
                    ->first();
        $emails = $bioData->email;
        $customer = $bioData->nama;

        $firstEmail = $emails;
        $firstCustomer = $customer;

        if ($firstEmail != null) {
            $mail = new PHPMailer(true); // Passing `true` enables exceptions

            try {
                // Server settings
                $mail->isSMTP(); // Send using SMTP
                $mail->Host       = env('MAIL_HOST');
                $mail->SMTPAuth   = true; // Enable SMTP authentication
                $mail->Username   = env('MAIL_USERNAME');
                $mail->Password   = env('MAIL_PASSWORD');
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                $mail->Port       = env('MAIL_PORT');
    
                // Recipients
                $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $mail->addAddress($firstEmail, $firstCustomer); // Add a recipient
    
                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Notifikasi SneakSpark';
                $mail->Body    = view('admin.export.email', [
                                    'title' => 'Notification',
                                    'bioData' => $bioData,
                                    'pesanan' => Pesanan::find($request->idPesanan),
                                    'detailPesanans' => $detailPesanan,
                                ]);
    
                $mail->send();
                return redirect()->route('pesananKondisi', ['kondisi' => $request->status])->with('Notification', 'Pesanan berhasil Diperbaharui! dan Notifikasi Berhasil dikirim ke pelanggan via email');
            } catch (Exception $e) {
                return redirect()->route('pesanan')->with('Notification', 'Email gagal dikirim. Pesan error: {$mail->ErrorInfo}');
            }
        }

        return redirect()->route('pesananKondisi', ['kondisi' => $request->status])->with('Notification', 'Pesanan berhasil Diperbaharui! dan Notifikasi Berhasil dikirim ke pelanggan via email');
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
