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
        <a href="/user/index" class="btn btn-info">Kembali</a>
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
                    <form action="/user/update/{id}" class="form" method="POST">
                      @csrf
                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                        <div class="form-body">
                          <h4 class="form-section">Edit User</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role" class="">Role</label>
                                        <input type="text" class="form-control" value="{{$user->role}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="">Nama</label>
                                        <input type="text" id="nama" class="form-control" name="nama" value="{{ $user->nama }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik" class="">NIK</label>
                                        <input type="text" id="nik" class="form-control" name="nik" value="{{ $user->nik }}"
                                        onkeydown="return ( event.ctrlkey || event.altkey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34) && (event.keyCode<40)
                                        || (event.keyCode==46) )">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telp" class="">No Telp</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+62</span>
                                            </div>
                                            <input type="text" id="no_telp" class="form-control" placeholder="8xxx"
                                                name="no_telp" value="{{ $user->no_telp }}" min="1" required onkeydown="return ( event.ctrlkey || event.altkey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34) && (event.keyCode<40)
                                        || (event.keyCode==46) )">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat" class="">Alamat</label>
                                        <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $user->alamat }}">
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