<?php

namespace App\Http\Controllers;

use App\DetailPerbaikan;
use App\Perbaikan;
use App\Asset;
use Illuminate\Http\Request;

class DetailPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detailPerbaikan'] = DetailPerbaikan::with('perbaikan', 'asset')->get();
        $data['nomor'] = 1;

        return view('detailPerbaikan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['detailPerbaikan'] = DetailPerbaikan::all();
        return view('detailPerbaikan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailPerbaikan::create([
            'id_perbaikan' => $request['id_perbaikan'],
            'id_asset' => $request['id_asset'],
            'harga_estimasi' => $request['harga_estimasi'],
        ]);

        return redirect('/detailPerbaikan/index')->with('OK', 'Berhasil menambah Detail Perbaikan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPerbaikan  $detailPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPerbaikan $detailPerbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPerbaikan  $detailPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['detailPerbaikan'] = DetailPerbaikan::find($request['id']);
        $data['perbaikan'] = Perbaikan::all();

        return view('detailPerbaikan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPerbaikan  $detailPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPerbaikan $detailPerbaikan)
    {
        $detailPerbaikan = DetailPerbaikan::find($request['id']);
        $detailPerbaikan->update([
            'id_perbaikan' => $request['id_perbaikan'],
            'id_asset' => $request['id_asset'],
            'harga_estimasi' => $request['harga_estimasi'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPerbaikan  $detailPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detailPerbaikan = DetailPerbaikan::find($request['id']);
        $detailPerbaikan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Detail Perbaikan!'); 
    }
}
