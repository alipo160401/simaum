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
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <a href="/perbaikan/create" class="btn btn-info">Tambah</a>
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
                    <table class="table table-responsive datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Pengajuan</th>
                                <th>Vendor</th>
                                <th>Total Harga Estimasi</th>
                                <th>Total Harga Real</th>
                                <th>Invoice</th>
                                <th>Berita Acara</th>
                                <th>Tanggal Beli</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perbaikan as $data)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $data->no_pengajuan }}</td>
                                <td>{{ $data->vendor->nama }}</td>
                                <td>{{ $data->total_harga_estimasi }}</td>
                                <td>{{ $data->total_harga_real }}</td>
                                <td>{{ $data->invoice }}</td>
                                <td><a href="{{ $data->berita_acara }}" class="btn btn-info">Lihat</a></td>
                                <td>{{ $data->tanggal_beli }}</td>
                                <td>
                                    @if($data->status == 'Belum dikonfirmasi')
                                        <p class="bg-warning text-white p-1 text-center status-box">{{ $data->status }}</span>
                                    @elseif ($data->status == 'Pengajuan dikonfirmasi')                                
                                        <p class="bg-success text-white p-1 text-center status-box">{{ $data->status }}</span>
                                    @elseif ($data->status == 'Pengajuan ditolak')
                                        <p class="bg-danger text-white p-1 text-center status-box">{{ $data->status }}</span>
                                    @elseif ($data->status == 'Proses pengajuan')
                                        <p class="bg-warning text-white p-1 text-center status-box">{{ $data->status }}</span>
                                    @endif
                                <td>
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info round dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="la la-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" x-placement="button-start">
                                    @if ($data->status != "Pengajuan ditolak")
                                    <a href="/perbaikan/edit/{{ $data->id }}">
                                        <button class="dropdown-item btn btn-outline-info">
                                            <i class="la la-edit">
                                                <label for="">Edit</label>
                                            </i>
                                        </button>
                                    </a>
                                    @endif
                                    <a href="/perbaikan/{{ $data->id }}">
                                        <button class="dropdown-item btn btn-outline-info">
                                            <i class="la la-search">
                                                <label for="">Detail</label>
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
                    <h4 class="modal-title text-white">Apakah anda yakin ingin menghapus Perbaikan ini ?</h4>
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
        $("#deleteForm").attr("action", "/perbaikan/destroy/"+ id);
        $("#deleteId").val(id);
        $("#delete").modal();
    });
</script>
@endsection