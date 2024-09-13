<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function authenticate(Request $request)
    {
        $credit = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('web')->attempt($credit)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
 
        return back()->with('Notification', 'Akses Masuk Salah, Periksa lagi akses masuknya!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login')->with('Notification', 'Logout Success!');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('user.auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function register()
    {
        return view('user.auth.register', [
            'title' => 'Daftar',
            'active' => 'daftar'
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
    public function storeRegister(Request $request)
    {
        $password = $request->password;
        $confPassword = $request->confPassword;

        if ($password !== $confPassword) {
            return redirect()->route('daftar')->with('Notification', 'Password Tidak Cocok Satu Sama Lain!');
        }

        DB::table('users')->insertOrIgnore([
            'name' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'password' => bcrypt($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login')->with('Notification', 'Registrasi Kamu Berhasil!, Silahkan Login!');
    }
    
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
    public function updateProfile(Request $request)
    {
        DB::table('users')
            ->where('id', $request->idUser)
            ->update([
                'name' => $request->nama,
                'no_tlp' => $request->no_tlp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'updated_at' => now(),
            ]);

        return redirect()->route('profile')->with('Notification', 'Data Berhasil Diperbaharui!');
    }
    
    public function updatePassword(Request $request)
    {
        $password = $request->newPassword;
        $confPassword = $request->confPassword;

        if ($password !== $confPassword) {
            return redirect()->route('ubahPassword')->with('Notification', 'Password Tidak Cocok Satu Sama Lain!');
        }

        DB::table('users')
            ->where('id', $request->idUser)
            ->update([
                'password' => bcrypt($password),
                'updated_at' => now(),
            ]);

        return redirect()->route('profile')->with('Notification', 'Password Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
