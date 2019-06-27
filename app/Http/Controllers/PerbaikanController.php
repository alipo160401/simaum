<?php

namespace App\Http\Controllers;

use App\Perbaikan;
use App\DetailPerbaikan;
use App\Vendor;
use App\Asset;
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
        $perbaikan = Perbaikan::create([
            'id_vendor' => $request['id_vendor'],
            'no_pengajuan' => $request['no_pengajuan'],
            'status' => 'Proses pengajuan',
            'total_harga_real' => $request['total_harga_real'],
            'total_harga_estimasi' => $request['total_harga_estimasi'],
            'invoice' => $request['invoice'],
            'berita_acara' => $request['berita_acara'],
            'tanggal_beli' => $request['tanggal_beli'],
        ]);

        return redirect('/perbaikan/'.$perbaikan->id)->with('OK', 'Silahkan tambah list barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['perbaikan'] = Perbaikan::with('vendor', 'detail_perbaikan', 'asset')->where('id', $id)->first();
        $data['vendor'] = Vendor::all();
        $data['asset'] = Asset::where('status_pemusnahan', 'False')->where('kondisi', 'Rusak(bisa diperbaiki)')->get();

        return view('perbaikan.show', $data);
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
    public function update(Request $request, $id)
    {
        $perbaikan = Perbaikan::find($id);

        if (isset($_GET['status'])) 
        {
            if ($_GET['status'] == 'selesai') 
            {
                $perbaikan->update([
                    'status' => 'Belum dikonfirmasi',
                ]);
                return redirect()->back()->with('OK', 'Berhasil mengirim pengajuan');
            }
            if ($_GET['status'] == 'dikonfirmasi') 
            {
                $perbaikan->update([
                    'status' => 'Pengajuan dikonfirmasi',
                ]);
                return redirect()->back()->with('OK', 'Berhasil mengkonfirmasi pengajuan');
            }
            if ($_GET['status'] == 'ditolak') 
            {
                $perbaikan->update([
                    'status' => 'Pengajuan ditolak',
                ]);
                return redirect()->back()->with('OK', 'Berhasil menolak pengajuan');
            }
        }

        $validPath = '';
        if ($request->file('berita_acara')) {
            $berita_acara = $request->file('berita_acara');
            $path = $berita_acara->store('/public/berita_acara'); // with /public on path
            $filename = $berita_acara->hashName(); // remove the /public on path
            $validPath = url('/').'/storage/berita_acara/' . $filename;    
        }

        $perbaikan->update([
            'id_vendor' => $request['id_vendor'],
            'no_pengajuan' => $request['no_pengajuan'],
            'total_harga_real' => $request['total_harga_real'],
            'total_harga_estimasi' => $request['total_harga_estimasi'],
            'invoice' => $request['invoice'],
            'berita_acara' => $validPath,
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
