<?php

namespace App\Http\Controllers;

use App\PemeliharaanRutin;
use App\Vendor;
use App\Asset;
use Illuminate\Http\Request;

class PemeliharaanRutinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pemeliharaanRutin'] = PemeliharaanRutin::with('vendor')->get();
        $data['nomor'] = 1;

        return view('pemeliharaanRutin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['vendor'] = Vendor::all();
        return view('pemeliharaanRutin.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $pemeliharaanRutin = PemeliharaanRutin::create([
            'id_vendor' => $request['id_vendor'],
            'no_pengajuan' => $request['no_pengajuan'],
            'status' => 'Belum dikonfirmasi',
            'total_harga_real' => $request['total_harga_real'],
            'total_harga_estimasi' => $request['total_harga_estimasi'],
            'invoice' => $request['invoice'],
            'berita_acara' => $request['berita_acara'],
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect('/pemeliharaanRutin/'.$pemeliharaanRutin->id)->with('OK', 'Silahkan tambah list barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PemeliharaanRutin  $pemeliharaanRutin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pemeliharaanRutin'] = PemeliharaanRutin::with('vendor', 'detail_pemeliharaan', 'asset')->where('id', $id)->first();
        $data['vendor'] = Vendor::all();
        $data['asset'] = Asset::all();

        return view('pemeliharaanRutin.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PemeliharaanRutin  $pemeliharaanRutin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['pemeliharaanRutin'] = PemeliharaanRutin::find($request['id']);
        $data['vendor'] = Vendor::all();

        return view('pemeliharaanRutin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PemeliharaanRutin  $pemeliharaanRutin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemeliharaanRutin $pemeliharaanRutin)
    {
        $pemeliharaanRutin = PemeliharaanRutin::find($request['id']);
        $pemeliharaanRutin->update([
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
     * @param  \App\PemeliharaanRutin  $pemeliharaanRutin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemeliharaanRutin = PemeliharaanRutin::find($request['id']);
        $pemeliharaanRutin->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Pengajuan Pemeliharaan Rutin!'); 
    }
}
