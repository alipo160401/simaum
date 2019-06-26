<?php

namespace App\Http\Controllers;

use App\Tanah;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tanah'] = Tanah::all();
        $data['nomor'] = 1;

        return view('tanah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tanah.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tanah::create([
            'lokasi' => $request['lokasi'],
            'luas' => $request['luas'],
            'no_sertifikat' => $request['no_sertifikat'],
        ]);

        return redirect('/tanah/index')->with('OK', 'Berhasil menambah Tanah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function show(Tanah $tanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['tanah'] = Tanah::find($request['id']);

        return view('tanah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanah $tanah)
    {
        $tanah = Tanah::find($request['id']);
        $tanah->update([
            'lokasi' => $request['lokasi'],
            'luas' => $request['luas'],
            'no_sertifikat' => $request['no_sertifikat'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tanah = Tanah::find($request['id']);
        $tanah->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Tanah!'); 
    }
}
