<?php

namespace App\Http\Controllers;

use App\DetailPengadaan;
use App\Pengadaan;
use Illuminate\Http\Request;

class DetailPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detailPengadaan'] = DetailPengadaan::with('pengadaan')->get();
        $data['nomor'] = 1;

        return view('detailPengadaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['detailPengadaan'] = DetailPengadaan::all();
        return view('detailPengadaan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailPengadaan::create([
            'id_pengadaan' => $request['id_pengadaan'],
            'nama_barang' => $request['nama_barang'],
            'harga_estimasi' => $request['harga_estimasi'],
        ]);

        $pengadaan = Pengadaan::find($request['id_pengadaan']);
        $pengadaan->update([
            'total_harga_estimasi' => $pengadaan->total_harga_estimasi + $request['harga_estimasi']
        ]);

        return redirect('/pengadaan/'. $pengadaan->id)->with('OK', 'Berhasil menambah barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPengadaan  $detailPengadaan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPengadaan $detailPengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPengadaan  $detailPengadaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['detailPengadaan'] = DetailPengadaan::find($id);

        return view('detailPengadaan.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPengadaan  $detailPengadaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengadaan = Pengadaan::find($request['id_pengadaan']);
        $detailPengadaan = DetailPengadaan::find($id);
        
        $pengadaan->update([
            'total_harga_estimasi' => $pengadaan->total_harga_estimasi - $detailPengadaan->harga_estimasi + $request['harga_estimasi'],
        ]);

        $detailPengadaan->update([
            'id_pengadaan' => $request['id_pengadaan'],
            'nama_barang' => $request['nama_barang'],
            'harga_estimasi' => $request['harga_estimasi'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPengadaan  $detailPengadaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detailPengadaan = DetailPengadaan::find($request['id']);
        $pengadaan = Pengadaan::find($detailPengadaan->id_pengadaan);
        $pengadaan->update([
            'total_harga_estimasi' => $pengadaan->total_harga_estimasi - $detailPengadaan->harga_estimasi,
        ]);
        $detailPengadaan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Detail Pengadaan!'); 
    }
}
