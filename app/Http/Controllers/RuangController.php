<?php

namespace App\Http\Controllers;

use App\Ruang;
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
        $data['ruang'] = Ruang::all();
        $data['nomor'] = 1;

        return view('ruang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ruang::create([
            'nama' => $request['nama'],
            'kode' => $request['kode'],
            'jenis' => $request['jenis'],
        ]);

        return redirect('/ruang/index')->with('OK', 'Berhasil menambah Ruang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['ruang'] = Ruang::find($request['id']);

        return view('ruang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruang $ruang)
    {
        $ruang = Ruang::find($request['id']);
        $ruang->update([
            'nama' => $request['nama'],
            'kode' => $request['kode'],
            'jenis' => $request['jenis'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ruang = Ruang::find($request['id']);
        $ruang->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Ruang!'); 
    }
}
