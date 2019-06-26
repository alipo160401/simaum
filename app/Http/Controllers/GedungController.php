<?php

namespace App\Http\Controllers;

use App\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gedung'] = Gedung::all();
        $data['nomor'] = 1;

        return view('gedung.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gedung.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gedung::create([
            'nama' => $request['nama'],
            'lokasi' => $request['lokasi'],
            'luas' => $request['luas'],
        ]);

        return redirect('/gedung/index')->with('OK', 'Berhasil menambah Gedung.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function show(Gedung $gedung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['gedung'] = Gedung::find($request['id']);

        return view('gedung.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gedung $gedung)
    {
        $gedung = Gedung::find($request['id']);
        $gedung->update([
            'nama' => $request['nama'],
            'lokasi' => $request['lokasi'],
            'luas' => $request['luas'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gedung = Gedung::find($request['id']);
        $gedung->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Gedung!'); 
    }
}
