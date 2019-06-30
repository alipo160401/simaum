<?php

namespace App\Http\Controllers;

use App\DetailPemindahan;
use App\Pemindahan;
use App\Asset;
use App\Ruang;
use Illuminate\Http\Request;

class DetailPemindahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detailPemindahan'] = DetailPemindahan::with('pemindahan', 'asset', 'ruang')->get();
        $data['nomor'] = 1;

        return view('detailPemindahan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['detailPemindahan'] = DetailPemindahan::all();
        return view('detailPemindahan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemindahan = Pemindahan::find($request['id_pemindahan']);
        $barang = DetailPemindahan::where('id_asset', $request['id_asset'])->first();
        if ($barang != null) {
            return redirect('/pemindahan/'. $pemindahan->id)->with('ERR', 'Tidak dapat menambahkan barang yang sama.');
        }
        
        DetailPemindahan::create([
            'id_pemindahan' => $request['id_pemindahan'],
            'id_asset' => $request['id_asset'],
        ]);

        return redirect('/pemindahan/'. $pemindahan->id)->with('OK', 'Berhasil menambah barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPemindahan  $detailPemindahan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPemindahan $detailPemindahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPemindahan  $detailPemindahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['detailPemindahan'] = DetailPemindahan::find($id);

        return view('detailPemindahan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPemindahan  $detailPemindahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detailPemindahan = DetailPemindahan::find($id);
        $detailPemindahan->update([
            'id_perbaikan' => $request['id_perbaikan'],
            'id_asset' => $request['id_asset'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPemindahan  $detailPemindahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detailPemindahan = DetailPemindahan::find($request['id']);
        $detailPemindahan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Barang!'); 
    }
}
