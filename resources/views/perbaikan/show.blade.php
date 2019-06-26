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
                <h4 class="card-title">Form Pengajuan Perbaikan</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label >Nomor Pengajuan</label>
                            <input type="text"  class="form-control" placeholder="Nomor Pengajuan" name="no_pengajuan" value="{{ $perbaikan->no_pengajuan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Vendor</label>
                            <select name="id_vendor" id="id_vendor" class="form-control" readonly>
                                @foreach ($vendor as $item)
                                
                                    <option value="{{ $item->id }}" {{ $item->id == $perbaikan->id_vendor ? 'selected' : '' }}>{{ $item->nama }}, Bidang Pekerjaan: {{ $item->bidang_pekerjaan }}, PIC Vendor: {{ $item->pic_vendor }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Total Harga Estimasi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" name="total_harga_estimasi" value="{{ $perbaikan->total_harga_estimasi }}" readonly>
                            </div>                        
                        </div>
                        @if ($perbaikan->total_harga_estimasi != null)
                        <div class="form-actions">
                            <a href="/perbaikan/index">
                                <button class="btn btn-outline-primary" style="width: 100% !important;">
                                    <i class="ft-check"></i> Selesai
                                </button>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
                <h4 class="card-title">Tambah Barang</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <form action="/detailPerbaikan/store" method="post">
                        @csrf
                        <input type="hidden" name="id_perbaikan" value="{{ $perbaikan->id }}">
                        <div class="form-group">
                            <label>Barang</label>
                            <select name="id_asset" id="id_asset" class="form-control">
                                @foreach ($asset as $item)
                                    {{-- @if ( $item->kondisi == 'Rusak(tidak bisa diperbaiki)' ) --}}
                                
                                    <option value="{{ $item->id }}">{{ $item->nama }},Kode :{{ $item->kode }},Kondisi :{{ $item->kondisi }}</option>
                                
                                    {{-- @endif --}}
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga Estimasi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" name="harga_estimasi" required>
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
                <h4 class="card-title">List Barang</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <table class="table table-responsive datatable d-lg-table">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga Estimasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perbaikan->detail_Perbaikan as $data)
                                <tr>
                                    <td>{{ $data->asset->nama }},Kode: {{ $data->asset->kode }},Kondisi: {{ $data->asset->kondisi }}</td>
                                    <td>{{ $data->harga_estimasi }}</td>
                                    <td>
                                        <div class="btn-group text-center">
                                            <button type="button" class="btn btn-info round dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="la la-gear"></i>
                                            </button>
                                            <div class="dropdown-menu" x-placement="button-start">
                                                <a href="/detailPerbaikan/edit/{{ $data->id }}">
                                                    <button class="dropdown-item btn btn-outline-info">
                                                        <i class="la la-edit">
                                                            <label for="">Edit</label>
                                                        </i>
                                                    </button>
                                                </a>
                                                <button class="dropdown-item btn btn-outline-danger tombolHapus" value="{{ $data->id }}">
                                                    <i class="la la-trash">
                                                        <label for="">Hapus</label>
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal delete --}}
<div class="modal fade" id="delete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="deleteForm" method="POST">

                @csrf
                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white">Apakah anda yakin ingin menghapus barang ini ?</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="id" id="deleteId" class="btn btn-success round"> Yakin
                    </button>
                    <button type="button" class="btn btn-danger round" data-dismiss="modal"> Batal
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
    $(document).on("click", ".tombolHapus", function(){
        var id = $(this).val();
        $("#deleteForm").attr("action", "/detailPerbaikan/destroy/"+ id);
        $("#deleteId").val(id);
        $("#delete").modal();
    });
    </script>
@endsection