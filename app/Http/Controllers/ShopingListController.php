<?php

namespace App\Http\Controllers;

use App\ShopingList;
use Illuminate\Http\Request;

class ShopingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['shopingList'] = ShopingList::all();
        $data['nomor'] = 1;

        return view('shopingList.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shopingList.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ShopingList::create([
            'nama_barang' => $request['nama_barang'],
            'jenis_barang' => $request['jenis_barang'],
            'merek_barang' => $request['merek_barang'],
            'harga_barang' => $request['harga_barang'],
            'spesifikasi' => $request['spesifikasi'],
        ]);

        return redirect('/shopingList/index')->with('OK', 'Berhasil menambah Shoping List.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function show(ShopingList $shopingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['shopingList'] = ShopingList::find($request['id']);

        return view('shopingList.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopingList $shopingList)
    {
        $shopingList = ShopingList::find($request['id']);
        $shopingList->update([
            'nama_barang' => $request['nama_barang'],
            'jenis_barang' => $request['jenis_barang'],
            'merek_barang' => $request['merek_barang'],
            'harga_barang' => $request['harga_barang'],
            'spesifikasi' => $request['spesifikasi'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopingList  $shopingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $shopingList = ShopingList::find($request['id']);
        $shopingList->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Shoping List!'); 
    }
}
