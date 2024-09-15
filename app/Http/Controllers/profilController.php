<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pemesan;
use App\Models\Pesanan;
use App\Models\Detail_pesanan;
use App\Models\Layanan;

class profilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profil()
    {
        return view('user.profil.profil');
    }

    public function ubahProfil()
    {
        return view('user.profil.ubahProfil');
    }

    public function ubahPassword()
    {
        return view('user.profil.ubahPassword');
    }

    public function riwayatPesanan()
    {
        $cekPemesan = Pemesan::where('id_user',  auth('web')->user()->id)->get();
        $pesanan = Pesanan::all();
        $detailPesanan = Detail_pesanan::all();
        return view('user.profil.riwayatPesanan', [
            'title' => 'Riwayat Pesanan',
            'active' => 'riwayat',
            'pemesans' => $cekPemesan,
            'pesanans' => $pesanan,
            'details' => $detailPesanan,
            'layanans' => Layanan::all(),
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
