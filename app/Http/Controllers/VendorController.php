<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use App\Exports\VendorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vendor'] = Vendor::all();
        $data['nomor'] = 1;

        return view('vendor.index', $data);
    }
 
	public function exportExcel()
	{
		return Excel::download(new VendorExport, 'vendor.xlsx');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vendor::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'bidang_pekerjaan' => $request['bidang_pekerjaan'],
            'no_hp' => $request['no_hp'],
            'kontak' => $request['kontak'],
            'pic_vendor' => $request['pic_vendor'],
            'npwp' => $request['npwp'],
        ]);

        return redirect('/vendor/index')->with('OK', 'Berhasil menambah Vendor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $data['vendor'] = Vendor::find($request['id']);
        return view('vendor.detail', $data);
    }

    public function edit(Request $request)
    {
        $data['vendor'] = Vendor::find($request['id']);
        return view('vendor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor = Vendor::find($request['id']);
        $vendor->update([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'bidang_pekerjaan' => $request['bidang_pekerjaan'],
            'no_hp' => $request['no_hp'],
            'kontak' => $request['kontak'],
            'pic_vendor' => $request['pic_vendor'],
            'npwp' => $request['npwp'],
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $vendor = Vendor::find($request['id']);
        $vendor->delete();
        return redirect()->back()->with('OK', 'Berhasil menghapus Vendor!'); 
    }
}
