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
        $barang = Asset::find($request['id_asset']);
        if ($barang != null) {
            return redirect('/perbaikan/'. $perbaikan->id)->with('ERR', 'Tidak dapat menambahkan barang yang sama.');
        }
        
        DetailPerbaikan::create([
            'id_perbaikan' => $request['id_perbaikan'],
            'id_asset' => $request['id_asset'],
            'harga_estimasi' => $request['harga_estimasi'],
        ]);

        $perbaikan = Perbaikan::find($request['id_perbaikan']);
        $perbaikan->update([
            'total_harga_estimasi' => $perbaikan->total_harga_estimasi + $request['harga_estimasi']
        ]);

        return redirect('/perbaikan/'. $perbaikan->id)->with('OK', 'Berhasil menambah barang.');
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
    public function edit($id)
    {
        $data['detailPerbaikan'] = DetailPerbaikan::find($id);

        return view('detailPerbaikan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPerbaikan  $detailPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Perbaikan = Perbaikan::find($request['id_perbaikan']);
        $detailPerbaikan = DetailPerbaikan::find($id);
        
        $Perbaikan->update([
            'total_harga_estimasi' => $Perbaikan->total_harga_estimasi - $detailPerbaikan->harga_estimasi + $request['harga_estimasi'],
        ]);

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
        $perbaikan = Perbaikan::find($detailPerbaikan->id_perbaikan);
        $perbaikan->update([
            'total_harga_estimasi' => $perbaikan->total_harga_estimasi - $detailPerbaikan->harga_estimasi,
        ]);
        $detailPerbaikan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Detail Perbaikan!'); 
    }
}
