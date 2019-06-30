@extends('master')

@section('title', 'Pemindahan')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data Pemindahan</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/pemindahan/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Pemindahan
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <a href="/pemindahan/index" class="btn btn-info">Kembali</a>
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
                    <form action="/pemindahan/update/{{ $pemindahan->id }}" class="form" method="POST">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section">Edit Pemindahan</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Lokasi Ruang</label>
                                        <select name="id_ruang" id="id_ruang" class="form-control">
                                            @foreach ($ruang as $item)
                                            
                                                <option value="{{ $item->id }}" {{ $pemindahan->id_ruang == $item->id ? 'selected' : '' }}>{{ $item->nama }}, Kode Ruang: {{ $item->kode }}, Jenis Ruang: {{ $item->jenis }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nomor Pengajuan</label>
                                        <input type="text"  class="form-control" placeholder="Nomor Pengajuan" name="no_pengajuan" value="{{ $pemindahan->no_pengajuan }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Tanggal Pemindahan</label>
                                        <input type="date"  class="form-control" placeholder="Tanggal Beli" name="tanggal_beli" value="{{ $pemindahan->tanggal_beli }}">
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