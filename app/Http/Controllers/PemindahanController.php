<?php

namespace App\Http\Controllers;

use App\DetailPemindahan;
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
        $data['pemindahan'] = Pemindahan::with('ruang')->get();
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
        $pemindahan = Pemindahan::create([
            'id_ruang' => $request['id_ruang'],
            'no_pengajuan' => $request['no_pengajuan'],
            'status' => 'Proses pengajuan',
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect('/pemindahan/'.$pemindahan->id)->with('OK', 'Silahkan tambah list barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemindahan  $pemindahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pemindahan'] = Pemindahan::with('ruang', 'detail_pemindahan', 'asset')->where('id', $id)->first();
        $data['ruang'] = Ruang::all();
        $data['asset'] = Asset::where('status_pemusnahan', 'False')->get();

        return view('pemindahan.show', $data);
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
    public function update(Request $request, $id)
    {
        $pemindahan = Pemindahan::find($id);

        if (isset($_GET['status'])) 
        {
            if ($_GET['status'] == 'selesai') 
            {
                $pemindahan->update([
                    'status' => 'Belum dikonfirmasi',
                ]);
                return redirect()->back()->with('OK', 'Berhasil mengirim pengajuan');
            }
            if ($_GET['status'] == 'dikonfirmasi') 
            {
                $pemindahan->update([
                    'status' => 'Pengajuan dikonfirmasi',
                ]);
                $detail_pemindahan = DetailPemindahan::where('id_pemindahan', $id)->get();
                foreach ($detail_pemindahan as $item) {
                    Asset::find($item->id_asset)->update([
                        'id_ruang' => $pemindahan->id_ruang,
                    ]);
                }
                return redirect()->back()->with('OK', 'Berhasil mengkonfirmasi pengajuan');
            }
            if ($_GET['status'] == 'ditolak') 
            {
                $pemindahan->update([
                    'status' => 'Pengajuan ditolak',
                ]);
                return redirect()->back()->with('OK', 'Berhasil menolak pengajuan');
            }
        }

        $pemindahan->update([
            'id_ruang' => $request['id_ruang'],
            'no_pengajuan' => $request['no_pengajuan'],
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
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
