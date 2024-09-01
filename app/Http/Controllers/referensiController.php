<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pegawai;

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
            'active' => 'pelanggan'
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
        return view('admin.referensi.pelayanan.pelayanan', [
            'title' => 'Pelayanan',
            'active' => 'pelayanan'
        ]);
    }

    public function ubahPelayanan()
    {
        return view('admin.referensi.pelayanan.ubahPelayanan', [
            'title' => 'Ubah Data Pelayanan',
            'active' => 'ubah-data-pelayanan'
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPegawai(string $id)
    {
        Pegawai::destroy($id);
        return redirect()->route('pegawai')->with('Notification', 'Data Berhasil Dihapus!');
    }
}
