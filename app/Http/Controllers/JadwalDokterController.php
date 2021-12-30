<?php

namespace App\Http\Controllers;

use App\Models\jadwal_dokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal_dokter = jadwal_dokter::all();
        return view('jadwal_dokter.index', compact('jadwal_dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal_dokter = jadwal_dokter::all();
        return view('jadwal_dokter.create', compact('jadwal_dokter'));

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
            'nama_dokter' => 'required',
            'waktu_mulai' => 'required',
            'waktu_akhir' => 'required',
        ]);

        $jadwal_dokter = new jadwal_dokter;
        $jadwal_dokter->nama_dokter = $request->nama_dokter;
        $jadwal_dokter->waktu_mulai = $request->waktu_mulai;
        $jadwal_dokter->waktu_akhir = $request->waktu_akhir;
        $jadwal_dokter->save();
        return redirect()->route('jadwal_dokter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal_dokter $jadwal_dokter)
    {
        $jadwal_dokter = jadwal_dokter::findOrFail($id);
        return view('jadwal_dokter.show', compact('jadwal_dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal_dokter $jadwal_dokter)
    {
        $jadwal_dokter = jadwal_dpkter::findOrFail($id);
        return view('jadwal_dokter.edit', compact('jadwal_dokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_dokter' => 'required',
            'waktu_mulai' => 'required',
            'waktu_akhir' => 'required',
        ]);

        $jadwal_dokter = jadwal_dokter::findOrFail($id);
        $jadwal_dokter->nama_dokter = $request->nama_dokter;
        $jadwal_dokter->waktu_mulai = $request->waktu_mulai;
        $jadwal_dokter->waktu_akhir = $request->waktu_akhir;
        $jadwal_dokter->save();
        return redirect()->route('jadwal_dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_dokter $jadwal_dokter)
    {
        $jadwal_dokter =jadwal_dokter::findOrFail($id);
        $jadwal_dokter->delete();
        return redirect()->route('jadwal_dokter.index');
    }
}
