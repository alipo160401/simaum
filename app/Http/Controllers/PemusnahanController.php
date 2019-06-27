<?php

namespace App\Http\Controllers;

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
        $data['asset'] = Asset::where('status_pemusnahan', '!=', null)->get();

        return view('pemusnahan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemusnahan::create([
            'id_asset' => $request['id_asset'],
            'nama_surat' => $request['nama_surat'],
            'no_surat' => $request['no_surat'],
            'pic_pekerja' => $request['pic_pekerja'],
            'status' => 'Belum dikonfirmasi',
        ]);

        return redirect('/pemusnahan/index')->with('OK', 'Berhasil Menambah Pengajuan Pemusnahan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemusnahan $pemusnahan)
    {
        //
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
    public function update(Request $request, Pemusnahan $pemusnahan)
    {
        $pemusnahan = Pemusnahan::Find($request['id']);
        $pemusnahan->update([
            'nama_surat' => $request['nama_surat'],
            'no_surat' => $request['no_surat'],
            'pic_pekerja' => $request['pic_pekerja'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil Mengubah Data!');
    }

    public function editStatus(Request $request)
    {
        $data['pemusnahan'] = Pemusnahan::find($request['id']);
        $data['asset'] = Asset::all();

        return view('pemusnahan.editStatus', $data);
    }

    public function updateStatus(Request $request)
    {
        $pemusnahan = Pemusnahan::find($request['id']);
        $pemusnahan->update([
            'status' => $request['status'],
        ]);

        if ($request['status'] == 'Pengajuan dikonfirmasi') {
            $asset = Asset::find($pemusnahan->id_asset);
            $asset->update([
                'status_pemusnahan' => 'Dimusnahkan',
            ]);
        }

        return redirect('/pemusnahan/index')->with('OK', 'Status Pemusnahan telah di-update!');
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
