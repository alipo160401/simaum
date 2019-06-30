@extends('master')

@section('title', 'Vendor')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data Vendor</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Vendor
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
                    <form action="/vendor/store" class="form" method="POST">
                      @csrf
                        <div class="form-body">
                          <h4 class="form-section">Tambah Vendor</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nama Vendor</label>
                                        <input type="text"  class="form-control" placeholder="Nama Vendor" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Alamat</label>
                                        <input type="text" id="nomor" class="form-control" placeholder="Alamat" name="alamat" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Bidang Pekerjaan</label>
                                        <input type="text" class="form-control" placeholder="Bidang Pekerjaan" name="bidang_pekerjaan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp" class="">No Handphone</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+62</span>
                                            </div>
                                            <input type="text" id="no_hp" class="form-control" placeholder="8xxx"
                                                name="no_hp" min="1" required onkeydown="return ( event.ctrlkey || event.altkey
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
                                        <label>Email</label>
                                        <input type="email" id="kontak" class="form-control" placeholder="example@gmail.com" name="kontak" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >PIC Vendor</label>
                                        <input type="text" id="pic_vendor" class="form-control" placeholder="PIC Vendor" name="pic_vendor" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >NPWP</label>
                                        <input type="text" id="npwp" class="form-control" placeholder="NPWP" name="npwp" required>
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