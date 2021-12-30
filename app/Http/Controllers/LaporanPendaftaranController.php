<?php

namespace App\Http\Controllers;

use App\Models\laporan_pendaftaran;
use Illuminate\Http\Request;

class LaporanPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_pendaftaran = laporan_pendaftaran::all();
        return view('laporan_pendaftaran.index', compact('laporan_pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan_pendaftaran.create');
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

        $laporan_pendaftaran = new laporan_pendaftaran;
        $laporan_pendaftaran->nama_pasien = $request->nama_pasien;
        $laporan_pendaftaran->keluhan = $request->keluhan;
        $laporan_pendaftaran->tanggal_daftar = $request->tanggal_daftar;
        $laporan_pendaftaran->no_telepon = $request->no_telepon;
        $laporan_pendaftaran->jk = $request->jk;
        $laporan_pendaftaran->nama_dokter = $request->nama_dokter;
        $laporan_pendaftaran->jadwal_periksa = $request->jadwal_periksa;
        $laporan_pendaftaran->ruang = $request->ruang;
        $laporan_pendaftaran->cara_bayar = $request->cara_bayar;

        $laporan_pendaftaran->save();
        return redirect()->route('laporan_pendaftaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporan_pendaftaran  $laporan_pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(laporan_pendaftaran $laporan_pendaftaran)
    {
        $laporan_pendaftaran = laporan_pendaftaran::findOrFail($id);
        return view('laporan_pendaftaran.show', compact('laporan_pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporan_pendaftaran  $laporan_pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan_pendaftaran $laporan_pendaftaran)
    {
        $laporan_pendaftaran = laporan_pendaftaran::findOrFail($id);
        return view('laporan_pendaftaran.edit', compact('laporan_pendaftaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporan_pendaftaran  $laporan_pendaftaran
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

        $laporan_pendaftaran = laporan_pendaftaran::findOrFail($id);
        $laporan_pendaftaran->nama_pasien = $request->nama_pasien;
        $laporan_pendaftaran->keluhan = $request->keluhan;
        $laporan_pendaftaran->tanggal_daftar = $request->tanggal_daftar;
        $laporan_pendaftaran->no_telepon = $request->no_telepon;
        $laporan_pendaftaran->jk = $request->jk;
        $laporan_pendaftaran->nama_dokter = $request->nama_dokter;
        $laporan_pendaftaran->jadwal_periksa = $request->jadwal_periksa;
        $laporan_pendaftaran->ruang = $request->ruang;
        $laporan_pendaftaran->cara_bayar = $request->cara_bayar;
        $laporan_pendaftaran->save();
        return redirect()->route('laporan_pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporan_pendaftaran  $laporan_pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan_pendaftaran $laporan_pendaftaran)
    {
        $laporan_pendaftaran =laporan_pendaftaran::findOrFail($id);
        $laporan_pendaftaran->delete();
        return redirect()->route('laporan_pendaftaran.index');
    }
}
