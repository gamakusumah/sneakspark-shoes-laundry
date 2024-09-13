<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexFaktur()
    {
        return view('admin.export.faktur', [
            'title' => 'Export Faktur',
        ]);
    }

    public function indexEmail()
    {
        return view('admin.export.email', [
            'title' => 'Export Email',
        ]);
    }

    public function indexLaporan()
    {
        return view('admin.export.laporan', [
            'title' => 'Export Laporan',
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
