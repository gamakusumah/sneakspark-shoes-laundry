<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Pegawai;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\User;
use App\Models\Vocher;

class referensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  Pelanggan Controller
    public function indexPelanggan()
    {
        return view('admin.referensi.pelanggan.pelanggan', [
            'title' => 'Pelanggan',
            'active' => 'pelanggan',
            'pelanggans' => User::all(),
        ]);
    }

    public function ubahPelanggan()
    {
        return view('admin.referensi.pelanggan.ubahPelanggan', [
            'title' => 'Ubah Data Pelanggan',
            'active' => 'ubah-data-pelanggan'
        ]);
    }

    // Pelayanan Controller
    public function indexPelayanan()
    {
        $layanans = DB::table('layanans')
                ->join('kategoris', 'layanans.id_kategori', '=', 'kategoris.id')
                ->select('layanans.id', 'layanans.nama_layanan', 'layanans.harga', 'kategoris.nama as kategori', 'layanans.deskripsi')
                ->get();
        return view('admin.referensi.pelayanan.pelayanan', [
            'title' => 'Pelayanan',
            'active' => 'pelayanan',
            'kategoris' => Kategori::all(),
            'layanans' => $layanans
        ]);
    }


    public function ubahPelayanan($id)
    {
        $layanan = DB::table('layanans')
                ->join('kategoris', 'layanans.id_kategori', '=', 'kategoris.id')
                ->select('layanans.id', 'layanans.nama_layanan', 'layanans.harga', 'kategoris.nama as kategori', 'kategoris.id as idKategori', 'layanans.deskripsi', 'layanans.image')
                ->where('layanans.id', $id)
                ->first();
        return view('admin.referensi.pelayanan.ubahPelayanan', [
            'title' => 'Ubah Data Pelayanan',
            'active' => 'ubah-data-pelayanan',
            'layanan' => $layanan,
            'kategoris' => Kategori::all(),
        ]);
    }

    public function indexKategori()
    {
        return view('admin.referensi.pelayanan.kategori', [
            'title' => 'Kategori',
            'active' => 'Kategori',
            'kategoris' => Kategori::all(),
        ]);
    }

    public function ubahKategori($id)
    {
        return view('admin.referensi.pelayanan.ubahKategori', [
            'title' => 'Ubah Data Kategori',
            'active' => 'ubah-data-kategori',
            'kategori' => Kategori::find($id),
        ]);
    }

    // pegawai Controller
    public function indexPegawai()
    {
        return view('admin.referensi.pegawai.pegawai', [
            'title' => 'Pegawai',
            'active' => 'pegawai',
            'pegawais' => Pegawai::all(),
        ]);
    }
    

    public function ubahPegawai($id)
    {
        return view('admin.referensi.pegawai.ubahPegawai', [
            'title' => 'Ubah Data Pegawai',
            'active' => 'ubah-data-pegawai',
            'pegawai' => Pegawai::find($id),
        ]);
    }

    // pegawai Controller
    public function indexVocher()
    {
        return view('admin.referensi.vocher.index', [
            'title' => 'Vocher',
            'active' => 'vocher',
            'vochers' => Vocher::all(),
        ]);
    }

    public function showVocher($id)
    {
        return view('admin.referensi.vocher.ubah', [
            'title' => 'Vocher',
            'active' => 'vocher',
            'vocher' => Vocher::find($id),
        ]);
    }

    public function profilPegawai()
    {
        return view('admin.referensi.pegawai.profil', [
            'title' => 'Profil Pegawai',
            'active' => 'profil-pegawai',
        ]);
    }

    public function ubahProfilPegawai()
    {
        return view('admin.referensi.pegawai.ubahProfil', [
            'title' => 'Ubah Profil Pegawai',
            'active' => 'ubah-profil-pegawai',
        ]);
    }

    public function ubahPasswordPegawai()
    {
        return view('admin.referensi.pegawai.ubahPassword', [
            'title' => 'Ubah Password Pegawai',
            'active' => 'ubah-password-pegawai',
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
    public function storePegawai(Request $request)
    {
        DB::table('pegawais')->insertOrIgnore([
            'nama' => $request->nama,
            'no_tlp' => $request->no_telp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'role' => $request->role,
            'status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pegawai')->with('Notification', 'Data Berhasil Ditambahkan!');
    }

    public function storeKategori(Request $request)
    {
        DB::table('kategoris')->insertOrIgnore([
            'nama' => $request->kategori,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kategori')->with('Notification', 'Data Berhasil Ditambahkan!');
    }
    
    public function storeVocher(Request $request)
    {
        DB::table('vochers')->insertOrIgnore([
            'kode_vocher' => $request->kode,
            'jumlah_pakai' => $request->jumlah,
            'diskon_persen' => $request->diskon,
            'keterangan' => $request->keterangan,
            'min_order' => $request->minorder,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('vocher')->with('Notification', 'Data Berhasil Ditambahkan!');
    }

    public function storeLayanan(Request $request)
    {
        $validationData = $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|file|max:2048',
        ]);

        DB::table('layanans')->insertOrIgnore([
            'id_kategori' => $request->kategori,
            'image' => $validationData['image'] = $request->file('image')->store('image-layanan', 'public'),
            'nama_layanan' => $request->layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('layanan')->with('Notification', 'Data Berhasil Ditambahkan!');
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
    public function updatePegawai(Request $request)
    {
        DB::table('pegawais')
            ->where('id', $request->idPegawai)
            ->update([
                'nama' => $request->nama,
                'no_tlp' => $request->no_telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'role' => $request->role,
                'status' => 'Aktif',
                'updated_at' => now(),
            ]);

        return redirect()->route('ubahPegawai', ['id' => $request->idPegawai])->with('Notification', 'Data Berhasil Diperbaharui!');
    }

    public function updatePasswordPegawai(Request $request)
    {
        DB::table('pegawais')
        ->where('id', $request->idPegawai)
        ->update([
            'password' => bcrypt($request->password),
            'updated_at' => now(),
        ]);

        return redirect()->route('ubahPegawai', ['id' => $request->idPegawai])->with('Notification', 'Password Berhasil Diperbaharui!');
    }

    public function updateKategori(Request $request)
    {
        DB::table('kategoris')
            ->where('id', $request->idKategori)
            ->update([
                'nama' => $request->kategori,
                'keterangan' => $request->keterangan,
                'updated_at' => now(),
            ]);

        return redirect()->route('ubahKategori', ['id' => $request->idKategori])->with('Notification', 'Data Berhasil Diperbaharui!');
    }
    
    public function updateVocher(Request $request)
    {
        DB::table('vochers')
            ->where('id', $request->idVocher)
            ->update([
                'kode_vocher' => $request->kode,
                'jumlah_pakai' => $request->jumlah,
                'diskon_persen' => $request->diskon,
                'keterangan' => $request->keterangan,
                'min_order' => $request->minorder,
                'status' => $request->status,
                'updated_at' => now(),
            ]);

        return redirect()->route('ubahVocher', ['id' => $request->idVocher])->with('Notification', 'Data Berhasil Diperbaharui!');
    }

    public function updateLayanan(Request $request)
    {
        if ($request->image) {
            $validationData = $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|file|max:2048',
            ]);
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validationData['image'] = $request->file('image')->store('image-layanan', 'public');
            Layanan::where('id', $request->idLayanan)->update($validationData);
        }

        DB::table('layanans')
            ->where('id', $request->idLayanan)
            ->update([
                'id_kategori' => $request->kategori,
                'nama_layanan' => $request->layanan,
                'harga' => $request->harga,
                'deskripsi' => $request->keterangan,
                'updated_at' => now(),
            ]);

        return redirect()->route('ubahLayanan', ['id' => $request->idLayanan])->with('Notification', 'Data Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPegawai(string $id)
    {
        Pegawai::destroy($id);
        return redirect()->route('pegawai')->with('Notification', 'Data Berhasil Dihapus!');
    }

    public function destroyKategori(string $id)
    {
        Kategori::destroy($id);
        return redirect()->route('kategori')->with('Notification', 'Data Berhasil Dihapus!');
    }

    public function destroyLayanan(string $id)
    {
        Layanan::destroy($id);
        return redirect()->route('layanan')->with('Notification', 'Data Berhasil Dihapus!');
    }
}
