@extends('master')

@section('title', 'Pemeliharaan')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data Pemeliharaan</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/pemeliharaanRutin/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Pemeliharaan
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <a href="/pemeliharaanRutin/{{ $detailPemeliharaan->id_pemeliharaan_rutin }}" class="btn btn-info">Kembali</a>
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
                    <form action="/detailPemeliharaan/update/{{ $detailPemeliharaan->id }}" method="post">
                        @csrf
                        <input type="hidden" name="id_pemeliharaan_rutin" value="{{ $detailPemeliharaan->id_pemeliharaan_rutin }}">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{ $detailPemeliharaan->asset->nama }},Kode: {{ $detailPemeliharaan->asset->kode }},Kondisi: {{ $detailPemeliharaan->asset->kondisi }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Harga Estimasi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" name="harga_estimasi" value="{{ $detailPemeliharaan->harga_estimasi }}" required onkeydown="return ( event.ctrlkey || event.altkey
                                || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                || (95<event.keyCode && event.keyCode<106)
                                || (event.keyCode==8) || (event.keyCode==9)
                                || (event.keyCode>34) && (event.keyCode<40)
                                || (event.keyCode==46) )">
                            </div>                        
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="ft-check"></i> Save
                            </button>
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