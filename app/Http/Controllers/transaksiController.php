<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.transaksi.pesanan.tambahPesanan', [
            'title' => 'Tambah Pesanan',
            'active' => 'tambah-pesanan'
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
