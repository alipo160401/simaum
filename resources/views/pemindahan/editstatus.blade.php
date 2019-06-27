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
                    <form action="/pemindahan/updateStatus/{id}" class="form" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $pemindahan->id }}">
                        <div class="form-body">
                            <h4 class="form-section">Edit Status</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <select name="id_asset" id="id_asset" class="form-control" readonly>
                                                <option value="{{ $pemindahan->asset->id }}">{{ $pemindahan->asset->nama }},Kode :{{ $pemindahan->asset->kode }},Ruang: {{ $pemindahan->asset->ruang->nama }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ruang Pemindahan</label>
                                        <select name="ruang_id" id="ruang_id" class="form-control" readonly>
                                                <option value="{{ $pemindahan->ruang->id }}">{{ $pemindahan->ruang->nama }},Kode :{{ $pemindahan->ruang->kode }},Jenis :{{ $pemindahan->ruang->jenis }},</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Pemindahan</label>
                                        <input type="text" class="form-control" placeholder="Nama Pemindahan" name="nama_surat"
                                            value="{{ $pemindahan->nama_surat }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomor Pemindahan</label>
                                        <input type="text" class="form-control" placeholder="Nomor Pemindahan" name="no_surat"
                                            value="{{ $pemindahan->no_surat }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Pemindahan</label>
                                        <input type="text" class="form-control" placeholder="Jenis Pemindahan"
                                            name="jenis_surat" value="{{ $pemindahan->jenis_surat }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>PIC Pekerja</label>
                                        <input type="text" class="form-control" placeholder="PIC Pekerja"
                                            name="pic_pekerja" value="{{ $pemindahan->pic_pekerja }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Status</label>
                                        <select class="form-control" name="status" id="status">
                                            @if ($pemindahan->status == 'Belum dikonfirmasi')
                                                <option value="Pengajuan dikonfirmasi">Pengajuan dikonfirmasi</option>
                                                <option value="Pengajuan ditolak">Pengajuan ditolak</option>
                                            @endif
                                        </select>
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