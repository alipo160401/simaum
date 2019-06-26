@extends('master')

@section('title', 'Perbaikan')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data Perbaikan</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/perbaikan/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Perbaikan
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <form action="/perbaikan/update/{id}" class="form" method="POST">
                      @csrf
                    <input type="hidden" id="id" name="id" value="{{ $perbaikan->id }}">
                        <div class="form-body">
                          <h4 class="form-section">Edit Perbaikan</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nomor Pengajuan</label>
                                        <input type="text"  class="form-control" placeholder="Nomor Pengajuan" name="no_pengajuan" value="{{ $perbaikan->no_pengajuan }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Vendor</label>
                                        <select name="id_vendor" id="id_vendor" class="form-control">
                                            @foreach ($vendor as $item)
                                            
                                                <option value="{{ $item->id }}" {{ $item->id == $perbaikan->id_vendor ? 'selected' : '' }}>{{ $item->nama }}, Bidang Pekerjaan: {{ $item->bidang_pekerjaan }}, PIC Vendor: {{ $item->pic_vendor }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Total Harga Estimasi</label>
                                        <input type="text" class="form-control" placeholder="Total Harga Estimasi" name="total_harga_estimasi" value="{{ $perbaikan->total_harga_estimasi }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Total Harga Real</label>
                                        <input type="text" class="form-control" placeholder="Total Harga Real" name="total_harga_real" value="{{ $perbaikan->total_harga_real }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Invoice</label>
                                        <input type="text"  class="form-control" placeholder="Invoice" name="invoice" value="{{ $perbaikan->invoice }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Berita Acara</label>
                                        <input type="file"  class="form-control" placeholder="Berita Acara" name="berita_acara" value="{{ $perbaikan->berita_acara }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Tanggal Beli</label>
                                        <input type="date"  class="form-control" placeholder="Tanggal Beli" name="tanggal_beli" value="{{ $perbaikan->tanggal_beli }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="ft-check"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection