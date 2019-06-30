@extends('master')

@section('title', 'Gedung')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data Gedung</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/gedung/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Gedung
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
                    <form action="/gedung/update/{id}" class="form" method="POST">
                      @csrf
                    <input type="hidden" id="id" name="id" value="{{ $gedung->id }}">
                        <div class="form-body">
                          <h4 class="form-section">Detail Gedung</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Gedung</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $gedung->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi Gedung</label>
                                        <input type="text" id="nama" class="form-control" name="lokasi" value="{{ $gedung->lokasi }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Luas Gedung</label>
                                        <input type="text"  class="form-control" name="luas" value="{{ $gedung->luas }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-actions">
                        <a href="/gedung/index">
                            <button type="submit" class="btn btn-outline-primary">
                                Kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection