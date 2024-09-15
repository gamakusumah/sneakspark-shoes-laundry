<?php

namespace App\Http\Controllers;

use App\Charts\PemasukanBulanan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function akses()
    {
        return view('admin.akses', [
            'title' => 'Akses Administrator',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credit = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credit)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
 
        return back()->with('Notification', 'Akses Masuk Salah, Periksa lagi akses masuknya!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/administrator')->with('Notification', 'Logout Success!');
    }

    public function index(PemasukanBulanan $chart)
    {
        // Menghitung total pendapatan hari ini tanpa Carbon
        $pendapatanHariIni = DB::table('pesanans')
            ->where('status', ['Selesai', 'Proses', 'Pengambilan'])  // Filter berdasarkan status pesanan selesai (opsional)
            ->whereDate('created_at', date('Y-m-d'))  // Filter berdasarkan tanggal hari ini dengan PHP date()
            ->sum('nominal');  // Menjumlahkan kolom 'total' sebagai pendapatan

            // Menghitung total pendapatan bulan ini tanpa Carbon
        $pendapatanBulanIni = DB::table('pesanans')
            ->where('status', ['Selesai', 'Proses', 'Pengambilan'])  // Filter berdasarkan status pesanan selesai
            ->whereMonth('created_at', date('m'))  // Filter berdasarkan bulan ini
            ->whereYear('created_at', date('Y'))  // Filter berdasarkan tahun ini
            ->sum('total');  // Menjumlahkan kolom 'total' sebagai pendapatan

            // Mendapatkan data bulan lalu
        $pendapatanBulanLalu = DB::table('pesanans')
            ->where('status', ['Selesai', 'Proses', 'Pengambilan'])  // Hanya hitung pesanan dengan status "Selesai"
            ->whereMonth('created_at', date('m', strtotime('first day of last month')))  // Hanya pesanan yang dibuat bulan lalu
            ->whereYear('created_at', date('Y', strtotime('first day of last month')))  // Hanya pesanan yang dibuat tahun lalu
            ->sum('total');  // Menjumlahkan kolom 'total' sebagai pendapatan

        $pendapatanKeseluruhan = DB::table('pesanans')
            ->where('status', 'Selesai')  // Hanya hitung pesanan dengan status "Selesai"
            ->sum('total');  // Menjumlahkan kolom 'total' sebagai pendapatan
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'pendapatanHari' => $pendapatanHariIni,
            'pendapatanBulan' => $pendapatanBulanIni,
            'pendapatanBulanLalu' => $pendapatanBulanLalu,
            'pendapatanKeseluruhan' => $pendapatanKeseluruhan,
            'pemesan' => DB::table('pemesans')->count(),
            'chart' => $chart->build(),
        ]);
    }
    public function indexPelanggan()
    {
        return view('admin.pelanggan', [
            'title' => 'Dashboard',
            'active' => 'dashboard'
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
