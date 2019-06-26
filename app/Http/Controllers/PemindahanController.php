<?php

namespace App\Http\Controllers;

use App\Pemindahan;
use App\Asset;
use App\Ruang;
use Illuminate\Http\Request;

class PemindahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pemindahan'] = Pemindahan::with('asset','ruang')->get();
        $data['nomor'] = 1;
        
        return view('pemindahan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['asset'] = Asset::with('ruang')->get();
        $data['ruang'] = Ruang::all();

        return view('pemindahan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemindahan::create([
            'id_asset' => $request['id_asset'],
            'id_ruang' => $request['id_ruang'],
            'nama_surat' => $request['nama_surat'],
            'no_surat' => $request['no_surat'],
            'jenis_surat' => $request['jenis_surat'],
            'pic_pekerja' => $request['pic_pekerja'],
            'status' => 'Belum dikonfirmasi'
        ]);
        return redirect('/pemindahan/index')->with('OK','Berhasil Menambah Surat Pengajuan Pemindahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemindahan  $pemindahan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemindahan $pemindahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemindahan  $pemindahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['pemindahan'] = Pemindahan::find($request['id']);
        $data['asset'] = Asset::all();
        $data['ruang'] = Ruang::all();
        return view('pemindahan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemindahan  $pemindahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemindahan $pemindahan)
    {
        $pemindahan = Pemindahan::find($request['id']);
        $pemindahan->update([
            'nama_surat' => $request['nama_surat'],
            'no_surat' => $request['no_surat'],
            'jenis_surat' => $request['jenis_surat'],
            'pic_pekerja' => $request['pic_pekerja'],
        ]);
        return redirect()->back()->with('OK', 'Berhasil Mengedit Data');
    }

    public function editStatus(Request $request)
    {
        $data['pemindahan'] = Pemindahan::find($request['id']);
        $data['ruang'] = Ruang::find($request['id']);
        return view('pemindahan.editstatus', $data);
    }

    public function updateStatus(Request $request)
    {
        $pemindahan = Pemindahan::find($request['id']);
        $pemindahan->update([
            'status' => $request['status'],
            ]);
            
        $asset = Asset::find($request['id_asset']);
        if ($request['status'] == 'Pengajuan dikonfirmasi') {
            $asset->update([
                'id_ruang' => $pemindahan->id_ruang,
            ]);    
        }
            
            
        return redirect('/pemindahan/index')->with('OK', 'Status pemindahan telah di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemindahan  $pemindahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemindahan = Pemindahan::find($request['id']);
        $pemindahan->delete();

        return redirect()->back()->with('OK', 'Berhasil Menghapus Data Pemindahan');
    }
}
