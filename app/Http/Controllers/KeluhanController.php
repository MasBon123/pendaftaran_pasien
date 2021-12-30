<?php

namespace App\Http\Controllers;

use App\Models\keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluhan = keluhan::all();
        return view('keluhan.index', compact('keluhan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keluhan.create');
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
            'nama_keluhan' => 'required',
        ]);

        $keluhan = new keluhan;
        $keluhan->nama_keluhan = $request->nama_keluhan;
        $keluhan->save();
        return redirect()->route('keluhan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keluhan = keluhan::findOrFail($id);
        return view('keluhan.show', compact('keluhan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function edit(keluhan $keluhan)
    {
        $keluhan = keluhan::findOrFail($id);
        return view('keluhan.edit', compact('keluhan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_keluhan' => 'required',
        ]);

        $keluhan = keluhan::findOrFail($id);
        $keluhan->nama_keluhan = $request->nama_keluhan;
        $keluhan->save();
        return redirect()->route('keluhan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keluhan =keluhan::findOrFail($id);
        $keluhan->delete();
        return redirect()->route('keluhan.index');
    }
}
