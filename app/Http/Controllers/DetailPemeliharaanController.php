<?php

namespace App\Http\Controllers;

use App\DetailPemeliharaan;
use App\PemeliharaanRutin;
use App\Asset;
use Illuminate\Http\Request;

class DetailPemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detailPemeliharaan'] = DetailPemeliharaan::with('pemeliharaanRutin', 'asset')->get();
        $data['nomor'] = 1;

        return view('detailPemeliharaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['detailPemeliharaan'] = DetailPemeliharaan::all();
        return view('detailPemeliharaan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemeliharaanRutin = PemeliharaanRutin::find($request['id_pemeliharaan_rutin']);
        $barang = DetailPemeliharaan::where('id_asset', $request['id_asset'])->first();

        if ($barang != null) {
            return redirect('/pemeliharaanRutin/'. $pemeliharaanRutin->id)->with('ERR', 'Tidak dapat menambahkan barang yang sama.');
        }
        
        DetailPemeliharaan::create([
            'id_pemeliharaan_rutin' => $request['id_pemeliharaan_rutin'],
            'id_asset' => $request['id_asset'],
            'harga_estimasi' => $request['harga_estimasi'],
        ]);

        $pemeliharaanRutin->update([
            'total_harga_estimasi' => $pemeliharaanRutin->total_harga_estimasi + $request['harga_estimasi']
        ]);

        return redirect('/pemeliharaanRutin/'. $pemeliharaanRutin->id)->with('OK', 'Berhasil menambah barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPemeliharaan  $detailPemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPemeliharaan $detailPemeliharaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPemeliharaan  $detailPemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['detailPemeliharaan'] = DetailPemeliharaan::find($id);

        return view('detailPemeliharaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPemeliharaan  $detailPemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemeliharaanRutin = PemeliharaanRutin::find($request['id_pemeliharaan_rutin']);
        $detailPemeliharaan = DetailPemeliharaan::find($id);
        
        $pemeliharaanRutin->update([
            'total_harga_estimasi' => $pemeliharaanRutin->total_harga_estimasi - $detailPemeliharaan->harga_estimasi + $request['harga_estimasi'],
        ]);

        $detailPemeliharaan->update([
            'id_pemeliharaan_rutin' => $request['id_pemeliharaan_rutin'],
            'harga_estimasi' => $request['harga_estimasi'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPemeliharaan  $detailPemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detailPemeliharaan = DetailPemeliharaan::find($request['id']);
        $pemeliharaanRutin = PemeliharaanRutin::find($detailPemeliharaan->id_pemeliharaan_rutin);
        $pemeliharaanRutin->update([
            'total_harga_estimasi' => $pemeliharaanRutin->total_harga_estimasi - $detailPemeliharaan->harga_estimasi,
        ]);
        $detailPemeliharaan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Detail Pemeliharaan Rutin!'); 
    }
}
