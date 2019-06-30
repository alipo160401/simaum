@extends('master')

@section('title', 'User')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data User</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user/index">Home</a>
                </li>
                <li class="breadcrumb-item active">User
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <a href="/user/create" class="btn btn-info">Tambah</a>
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
                    <table class="table table-responsive d-md-table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>NIK</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>+62 {{ $data->no_telp }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info round dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="la la-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" x-placement="button-start">
                                        <a href="/user/detail/{{ $data->id }}">
                                            <button class="dropdown-item btn btn-outline-info">
                                                <i class="la la-search">
                                                    <label for="">Detail</label>
                                                </i>
                                            </button>
                                        </a>
                                        <a href="/user/edit/{{ $data->id }}">
                                            <button class="dropdown-item btn btn-outline-info">
                                                <i class="la la-edit">
                                                    <label for="">Edit</label>
                                                </i>
                                            </button>
                                        </a>
                                        <a href="/user/editPassword/{{ $data->id }} ">
                                            <button class="dropdown-item btn btn-outline-warning">
                                                <i class="la la-lock">
                                                    <label for="">Ubah Password</label>
                                                </i>
                                            </button>
                                        </a>
                                @if ($data->id != Auth::user()->id)
                                    <button class="dropdown-item btn btn-outline-danger tombolHapus" value="{{ $data->id }}">
                                        <i class="la la-trash">
                                            <label for="">Hapus</label>
                                        </i>
                                    </button>
                                @endif
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
                        <h4 class="modal-title text-white">Apakah anda yakin ingin menghapus User ini ?</h4>
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
    $("#deleteForm").attr("action", "/user/destroy/"+ id);
    $("#deleteId").val(id);
    $("#delete").modal();
});
</script>
@endsection