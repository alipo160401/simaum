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
                    <form action="/pemusnahan/store" class="form" method="POST">
                      @csrf
                        <div class="form-body">
                          <h4 class="form-section">Tambah Pemusnahan</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nama Barang</label>
                                        <select name="id_asset" id="id_asset" class="form-control">
                                            
                                            @foreach ($asset as $item)
                                                {{-- @if ( $item->kondisi == 'Rusak(tidak bisa diperbaiki)' ) --}}
                                            
                                                <option value="{{ $item->id }}">{{ $item->nama }},Kode :{{ $item->kode }},Kondisi :{{ $item->kondisi }}</option>
                                            
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nama Pemusnahan</label>
                                        <input type="text" class="form-control" placeholder="Nama Pemusnahan" name="nama_surat" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nomor Pemusnahan</label>
                                        <input type="text" class="form-control" placeholder="Nomor Pemusnahan" name="no_surat" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >PIC Pekerja</label>
                                        <input type="text" class="form-control" placeholder="PIC Pekerja" name="pic_pekerja" required>
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