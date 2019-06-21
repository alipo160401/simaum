<?php

namespace App\Http\Controllers;

use App\Perbaikan;
use App\Vendor;
use Illuminate\Http\Request;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['perbaikan'] = Perbaikan::with('vendor')->get();
        $data['nomor'] = 1;

        return view('perbaikan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['vendor'] = Vendor::all();
        return view('perbaikan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Perbaikan::create([
            'id_vendor' => $request['id_vendor'],
            'no_pengajuan' => $request['no_pengajuan'],
            'status' => 'Belum dikonfirmasi',
            'total_harga_real' => $request['total_harga_real'],
            'total_harga_estimasi' => $request['total_harga_estimasi'],
            'invoice' => $request['invoice'],
            'berita_acara' => $request['berita_acara'],
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect('/perbaikan/index')->with('OK', 'Berhasil menambah Pengajuan Perbaikan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(Perbaikan $perbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['perbaikan'] = Perbaikan::find($request['id']);
        $data['vendor'] = Vendor::all();

        return view('perbaikan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perbaikan $perbaikan)
    {
        $perbaikan = Perbaikan::find($request['id']);
        $perbaikan->update([
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
     * @param  \App\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $perbaikan = Perbaikan::find($request['id']);
        $perbaikan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Pengajuan Perbaikan!'); 
    }
}
