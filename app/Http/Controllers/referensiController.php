<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'active' => 'pegawai'
        ]);
    }

    public function ubahPegawai()
    {
        return view('admin.referensi.pegawai.ubahPegawai', [
            'title' => 'Ubah Data Pegawai',
            'active' => 'ubah-data-pegawai'
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
