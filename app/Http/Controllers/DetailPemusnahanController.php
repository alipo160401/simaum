<?php

namespace App\Http\Controllers;

use App\DetailPemusnahan;
use App\Pemusnahan;
use App\Asset;
use Illuminate\Http\Request;

class DetailPemusnahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detailPemusnahan'] = DetailPemusnahan::with('pemusnahan', 'asset')->get();
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
        $data['detailPemusnahan'] = DetailPemusnahan::all();
        return view('detailPemusnahan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemusnahan = Pemusnahan::find($request['id_pemusnahan']);
        $barang = DetailPemusnahan::where('id_asset', $request['id_asset'])->first();
        if ($barang != null) {
            return redirect('/pemusnahan/'. $pemusnahan->id)->with('ERR', 'Tidak dapat menambahkan barang yang sama.');
        }
        
        DetailPemusnahan::create([
            'id_pemusnahan' => $request['id_pemusnahan'],
            'id_asset' => $request['id_asset'],
        ]);

        return redirect('/pemusnahan/'. $pemusnahan->id)->with('OK', 'Berhasil menambah barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPemusnahan  $detailPemusnahan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPemusnahan $detailPemusnahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPemusnahan  $detailPemusnahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['detailPemusnahan'] = DetailPemusnahan::find($id);

        return view('detailPemusnahan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPemusnahan  $detailPemusnahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detailPemusnahan = DetailPemusnahan::find($id);
        $detailPemusnahan->update([
            'id_perbaikan' => $request['id_perbaikan'],
            'id_asset' => $request['id_asset'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPemusnahan  $detailPemusnahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detailPemusnahan = DetailPemusnahan::find($request['id']);
        $detailPemusnahan->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Barang!'); 
    }
}
