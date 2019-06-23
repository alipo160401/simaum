<?php

namespace App\Http\Controllers;

use App\Pengadaan;
use App\Vendor;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pengadaan'] = Pengadaan::with('vendor')->get();
        $data['nomor'] = 1;

        return view('pengadaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['vendor'] = Vendor::all();
        return view('pengadaan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengadaan = Pengadaan::create([
            'id_vendor' => $request['id_vendor'],
            'no_pengajuan' => $request['no_pengajuan'],
            'status' => 'Belum dikonfirmasi',
            'total_harga_real' => $request['total_harga_real'],
            'total_harga_estimasi' => $request['total_harga_estimasi'],
            'invoice' => $request['invoice'],
            'berita_acara' => $request['berita_acara'],
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect('/pengadaan/'.$pengadaan->id)->with('OK', 'Silahkan tambah list barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pengadaan'] = Pengadaan::with('vendor', 'detail_pengadaan')->where('id', $id)->first();
        $data['vendor'] = Vendor::all();

        return view('pengadaan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['pengadaan'] = Pengadaan::find($request['id']);
        $data['vendor'] = Vendor::all();

        return view('pengadaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengadaan $pengadaan)
    {
        $pengadaan = Pengadaan::find($request['id']);
        $pengadaan->update([
            'id_vendor' => $request['id_vendor'],
            'no_pengajuan' => $request['no_pengajuan'],
            'total_harga_real' => $request['total_harga_real'],
            'total_harga_estimasi' => $request['total_harga_estimasi'],
            'invoice' => $request['invoice'],
            'berita_acara' => $request['berita_acara'],
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pengadaan = Pengadaan::find($request['id']);
        $pengadaan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Pengajuan Pengadaan!'); 
    }
}
