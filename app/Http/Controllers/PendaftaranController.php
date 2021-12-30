<?php

namespace App\Http\Controllers;

use App\Models\pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftaran = pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required',
            'keluhan' => 'required',
            'tanggal_daftar' => 'required',
            'no_telepon' => 'required',
            'jk' => 'required',
            'nama_dokter' => 'required',
            'jadwal_periksa' => 'required',
            'ruang' => 'required',
            'cara_bayar' => 'required',
        ]);

        $pendaftaran = laporan_pendaftaran::findOrFail($id);
        $pendaftaran->nama_pasien = $request->nama_pasien;
        $pendaftaran->keluhan = $request->keluhan;
        $pendaftaran->tanggal_daftar = $request->tanggal_daftar;
        $pendaftaran->no_telepon = $request->no_telepon;
        $pendaftaran->jk = $request->jk;
        $pendaftaran->nama_dokter = $request->nama_dokter;
        $pendaftaran->jadwal_periksa = $request->jadwal_periksa;
        $pendaftaran->ruang = $request->ruang;
        $pendaftaran->cara_bayar = $request->cara_bayar;
        $pendaftaran->save();
        return redirect()->route('pendaftaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(pendaftaran $pendaftaran)
    {
        $pendaftaran = pendaftaran::findOrFail($id);
        return view('pendaftaran.show', compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(pendaftaran $pendaftaran)
    {
        $pendaftaran = pendaftaran::findOrFail($id);
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required',
            'keluhan' => 'required',
            'tanggal_daftar' => 'required',
            'no_telepon' => 'required',
            'jk' => 'required',
            'nama_dokter' => 'required',
            'jadwal_periksa' => 'required',
            'ruang' => 'required',
            'cara_bayar' => 'required',
        ]);

        $pendaftaran = laporan_pendaftaran::findOrFail($id);
        $pendaftaran->nama_pasien = $request->nama_pasien;
        $pendaftaran->keluhan = $request->keluhan;
        $pendaftaran->tanggal_daftar = $request->tanggal_daftar;
        $pendaftaran->no_telepon = $request->no_telepon;
        $pendaftaran->jk = $request->jk;
        $pendaftaran->nama_dokter = $request->nama_dokter;
        $pendaftaran->jadwal_periksa = $request->jadwal_periksa;
        $pendaftaran->ruang = $request->ruang;
        $pendaftaran->cara_bayar = $request->cara_bayar;
        $pendaftaran->save();
        return redirect()->route('laporan_pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendaftaran $pendaftaran)
    {
        $pendaftaran =pendaftaran::findOrFail($id);
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index');
    }
}
