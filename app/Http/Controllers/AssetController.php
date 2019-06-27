<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Ruang;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['asset'] = Asset::with('ruang')->get();
        $today = Date('Y-m-d');
        foreach ($data['asset'] as $item) {
            if (Date('Y-m-d', strtotime($item->tanggal_penyusutan . " +" . $item->umur_ekonomis . " years")) == $today) {
                $value_sekarang = $item->value_sekarang - $item->penyusutan;
                $item->update([
                    'value_sekarang' => $value_sekarang,
                    'tanggal_penyusutan' => $today,
                ]);
            }
        }
        $data['nomor'] = 1;

        return view('asset.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['ruang'] = Ruang::all();
        return view('asset.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset = Asset::where('kode', $request['kode'])->first();
        if ($asset != null) {
            return redirect()->back()->with('ERR', 'Kode Asset telah digunakan, silahkan gunakan Kode yang lain');
        }

        $other = $request['sub_kategori_other'];
        if ($other != null && $other != '') {
            $request['sub_kategori'] = $other;
        };
        $penyusutan = (int)ceil((int)$request['value_beli']/(int)$request['umur_ekonomis']); 
        Asset::create([
            'id_ruang' => $request['id_ruang'],
            'nama' => $request['nama'],
            'kode' => $request['kode'],
            'kategori' => $request['kategori'],
            'sub_kategori' => $request['sub_kategori'],
            'jenis' => $request['jenis'],
            'deskripsi' => $request['deskripsi'],
            'tanggal_beli' => $request['tanggal_beli'],
            'value_beli' => $request['value_beli'],
            'value_sekarang' => $request['value_beli'],
            'umur_ekonomis' => $request['umur_ekonomis'],
            'penyusutan' => $penyusutan,
            'tanggal_penyusutan' => $request['tanggal_beli'],
            'kondisi' => $request['kondisi'],
            'status_pemusnahan' => 'False',
        ]);

        return redirect('/asset/index')->with('OK', 'Berhasil menambah Asset.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['asset'] = Asset::find($request['id']);
        $data['ruang'] = Ruang::all();

        return view('asset.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        $asset = Asset::find($request['id']);
        $asset->update([
            'id_ruang' => $request['id_ruang'],
            'nama' => $request['nama'],
            'kode' => $request['kode'],
            'kategori' => $request['kategori'],
            'sub_kategori' => $request['sub_kategori'],
            'jenis' => $request['jenis'],
            'deskripsi' => $request['deskripsi'],
            'tanggal_beli' => $request['tanggal_beli'],
            'value_beli' => $request['value_beli'],
            'umur_ekonomis' => $request['umur_ekonomis'],
            'kondisi' => $request['kondisi'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $asset = Asset::find($request['id']);
        $asset->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Asset!'); 
    }
}
