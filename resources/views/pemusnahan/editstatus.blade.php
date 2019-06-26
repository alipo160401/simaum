@extends('master')

@section('title', 'Pemusnahan')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data Pemusnahan</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/pemusnahan/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Pemusnahan
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
                    <form action="/pemusnahan/updateStatus/{id}" class="form" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $pemusnahan->id }}">
                        <div class="form-body">
                            <h4 class="form-section">Edit Status</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" id="id_asset" class="form-control" name="id_asset"
                                            value="{{ $pemusnahan->asset->nama }},Kode: {{ $pemusnahan->asset->kode }},Kondisi: {{ $pemusnahan->asset->kondisi }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Pemusnahan</label>
                                        <input type="text" class="form-control" placeholder="Nama Pemusnahan" name="nama_surat"
                                            value="{{ $pemusnahan->nama_surat }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomor Pemusnahan</label>
                                        <input type="text" class="form-control" placeholder="Nomor Pemusnahan" name="no_surat"
                                            value="{{ $pemusnahan->no_surat }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>PIC Pekerja</label>
                                        <input type="text" class="form-control" placeholder="PIC Pekerja"
                                            name="pic_pekerja" value="{{ $pemusnahan->pic_pekerja }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Status</label>
                                        <select class="form-control" name="status" id="status">
                                            @if ($pemusnahan->status == 'Belum dikonfirmasi')
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