<?php

namespace App\Http\Controllers;

use App\DetailPemusnahan;
use App\Pemusnahan;
use App\Asset;
use Illuminate\Http\Request;

class PemusnahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pemusnahan'] = Pemusnahan::with('asset')->get();
        $data['nomor'] = 1;

        return view('pemusnahan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemusnahan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemusnahan = Pemusnahan::create([
            'no_pengajuan' => $request['no_pengajuan'],
            'status' => 'Proses pengajuan',
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect('/pemusnahan/'.$pemusnahan->id)->with('OK', 'Silahkan tambah list barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pemusnahan'] = Pemusnahan::with('detail_pemusnahan', 'asset')->where('id', $id)->first();
        $data['asset'] = Asset::where('status_pemusnahan', 'False')->get();

        return view('pemusnahan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['pemusnahan'] = Pemusnahan::find($request['id']);
        $data['asset'] = Asset::all();

        return view('pemusnahan.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemusnahan = Pemusnahan::find($id);

        if (isset($_GET['status'])) 
        {
            if ($_GET['status'] == 'selesai') 
            {
                $pemusnahan->update([
                    'status' => 'Belum dikonfirmasi',
                ]);
                return redirect()->back()->with('OK', 'Berhasil mengirim pengajuan');
            }
            if ($_GET['status'] == 'dikonfirmasi') 
            {
                $pemusnahan->update([
                    'status' => 'Pengajuan dikonfirmasi',
                ]);
                $detail_pemusnahan = DetailPemusnahan::where('id_pemusnahan', $id)->get();
                foreach ($detail_pemusnahan as $item) {
                    Asset::find($item->id_asset)->update([
                        'status_pemusnahan' => 'True',
                    ]);
                }
                return redirect()->back()->with('OK', 'Berhasil mengkonfirmasi pengajuan');
            }
            if ($_GET['status'] == 'ditolak') 
            {
                $pemusnahan->update([
                    'status' => 'Pengajuan ditolak',
                ]);
                return redirect()->back()->with('OK', 'Berhasil menolak pengajuan');
            }
        }

        $pemusnahan->update([
            'no_pengajuan' => $request['no_pengajuan'],
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemusnahan = Pemusnahan::find($request['id']);
        $pemusnahan->delete();

        return redirect()->back()->with('OK','Berhasil Mengahapus Data Pemusnahan');
    }
}
