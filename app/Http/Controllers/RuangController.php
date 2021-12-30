<?php

namespace App\Http\Controllers;

use App\Models\ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang = ruang::all();
        return view('ruang.index', compact('ruang'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruang.create');
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
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $ruang = new ruang;
        $ruang->nama = $request->nama;
        $ruang->keterangan = $request->keterangan;
        $ruang->save();
        return redirect()->route('ruang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang = ruang::findOrFail($id);
        return view('ruang.show', compact('ruang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(ruang $ruang)
    {
        $ruang = ruang::findOrFail($id);
        return view('ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $ruang = keluhan::findOrFail($id);
        $ruang->nama = $request->nama;
        $ruang->keterangan = $request->keterangan;
        $ruang->save();
        return redirect()->route('ruang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ruang $ruang)
    {
        $ruang =ruang::findOrFail($id);
        $ruang->delete();
        return redirect()->route('ruaang.index');
    }
}
