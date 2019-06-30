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
        @if ($pemindahan->status != 'Proses pengajuan')
            <a href="/pemindahan/index" class="btn btn-info">Kembali</a>        
        @else
            @if (count($pemindahan->detail_pemindahan) > 0)
                <form action="/pemindahan/update/{{ $pemindahan->id }}?status=selesai" method="post">
                    @csrf
                    <button type="submit" class="btn btn-info">Selesai</button>
                </form>                
            @endif
        @endif
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
                <h4 class="card-title">Form Pengajuan Pemindahan</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label >Nomor Pengajuan</label>
                            <input type="text"  class="form-control" placeholder="Nomor Pengajuan" name="no_pengajuan" value="{{ $pemindahan->no_pengajuan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Ruang (Tujuan pemindahan)</label>
                            <select name="id_ruang" id="id_ruang" class="form-control" readonly>
                                @foreach ($ruang as $item)
                                
                                    <option value="{{ $item->id }}" {{ $item->id == $pemindahan->id_ruang ? 'selected' : '' }}>{{ $item->nama }}, Kode: {{ $item->kode }}, Jenis: {{ $item->jenis }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if ($pemindahan->status == 'Proses pengajuan')
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
                    <form action="/detailPemindahan/store" method="post">
                        @csrf
                        <input type="hidden" name="id_pemindahan" value="{{ $pemindahan->id }}">
                        <div class="form-group">
                            <label>Barang</label>
                            <select name="id_asset" id="id_asset" class="form-control">
                                @foreach ($asset as $item)
                                
                                    <option value="{{ $item->id }}">{{ $item->nama }}, Kode : {{ $item->kode }}, Ruang : {{ $item->ruang->nama }}</option>
                                
                                @endforeach
                            </select>
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
    @endif
    <div class="{{ $pemindahan->status == 'Proses pengajuan' ? 'col-md-8' : 'col-md-12' }}">
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
                                <th>Lokasi Barang</th>
                                @if ($pemindahan->status == 'Proses pengajuan')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemindahan->detail_pemindahan as $data)
                                <tr>
                                    <td>{{ $data->asset->nama }}, Kode: {{ $data->asset->kode }}, Kondisi: {{ $data->asset->kondisi }}</td>
                                    <td>{{ $data->asset->ruang->nama }}, Kode: {{ $data->asset->ruang->kode }}, Jenis: {{ $data->asset->ruang->jenis }}</td>
                                    @if ($pemindahan->status == 'Proses pengajuan')
                                    <td>
                                        <div class="btn-group text-center">
                                            <button type="button" class="btn btn-info round dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="la la-gear"></i>
                                            </button>
                                            <div class="dropdown-menu" x-placement="button-start">
                                                <button class="dropdown-item btn btn-outline-danger tombolHapus" value="{{ $data->id }}">
                                                    <i class="la la-trash">
                                                        <label for="">Hapus</label>
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($pemindahan->status == 'Belum dikonfirmasi')
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-success block" id="tombolKonfirmasi">Konfirmasi Pengajuan</button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-danger block" id="tombolTolak">Tolak Pengajuan</button>
        </div>
    </div>
@endif

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

<div class="modal fade" id="confirm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="confirmForm" action="/pemindahan/update/{{ $pemindahan->id }}?status=dikonfirmasi" method="POST">

                @csrf
                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white">Apakah anda yakin ingin mengkonfirmasi Pemindahan ini ?</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="id" id="confirmId" class="btn btn-success round"> Yakin
                    </button>
                    <button type="button" class="btn btn-danger round" data-dismiss="modal"> Batal
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="reject">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="rejectForm" action="/pemindahan/update/{{ $pemindahan->id }}?status=ditolak" method="POST">

                @csrf
                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white">Apakah anda yakin ingin menolak Pemindahan ini ?</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="id" id="rejectId" class="btn btn-success round"> Yakin
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
        $("#deleteForm").attr("action", "/detailPemindahan/destroy/"+ id);
        $("#deleteId").val(id);
        $("#delete").modal();
    });
        $(document).on("click", "#tombolKonfirmasi", function(){
            $("#confirm").modal();
        });
        $(document).on("click", "#tombolTolak", function(){
            $("#reject").modal();
        });
    </script>
@endsection