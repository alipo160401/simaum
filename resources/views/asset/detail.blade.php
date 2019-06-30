@extends('master')

@section('title', 'Asset')

@section('style')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Data Asset</h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/asset/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Asset
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-header-right col-md-6 col-12">
    <div class="btn-group float-md-right">
        <a href="/asset/index" class="btn btn-info">Kembali</a>
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
                    <form action="/asset/update/{id}" class="form" method="POST">
                      @csrf
                    <input type="hidden" id="id" name="id" value="{{ $asset->id }}">
                        <div class="form-body">
                          <h4 class="form-section">Detail Asset</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi Ruang</label>
                                        <select name="id_ruang" id="id_ruang" class="form-control" readonly>
                                            @foreach ($ruang as $item)
                                            
                                                <option value="{{ $item->id }}" {{ $item->id == $asset->id_ruang ? 'selected' : '' }}>{{ $item->nama }}, Kode Ruang: {{ $item->kode }}, Jenis Ruang: {{ $item->jenis }}</option>

                                            @endforeach
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nama Asset</label>
                                        <input type="text" class="form-control" placeholder="Nama Asset" name="nama" value="{{ $asset->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Kode Asset</label>
                                        <input type="text" class="form-control" placeholder="Kode Asset" name="kode" value="{{ $asset->kode }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Kategori</label>
                                        <select class="form-control" name="kategori" id="kategori" readonly>
                                            <option {{ $asset->kategori == 'Infrastruktur' ? 'selected' : '' }} value="Infrastruktur">Infrastruktur</option>
                                            <option {{ $asset->kategori == 'Inventaris' ? 'selected' : '' }} value="Inventaris">Inventaris</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Sub Kategori</label>
                                        <select class="form-control" name="sub_kategori" id="sub_kategori" readonly>
                                            <option {{ $asset->sub_kategori == 'Tanah' ? 'selected' : '' }} value="Tanah">Tanah</option>
                                            <option {{ $asset->sub_kategori == 'Gedung' ? 'selected' : '' }} value="Gedung">Gedung</option>
                                            <option {{ $asset->sub_kategori == 'Kendaraan' ? 'selected' : '' }} value="Kendaraan">Kendaraan</option>
                                            <option {{ $asset->sub_kategori == 'Alat Kantor' ? 'selected' : '' }} value="Alat Kantor">Alat Kantor</option>
                                            <option {{ $asset->sub_kategori == 'Fasilitas Perkuliahan' ? 'selected' : '' }} value="Fasilitas Perkuliahan">Fasilitas Perkuliahan</option>
                                            <option {{ $asset->sub_kategori == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Jenis</label>
                                        <select class="form-control" name="jenis" id="jenis" readonly>
                                            <option {{ $asset->jenis == 'Roda 2' ? 'selected' : '' }} value="Roda 2">Roda 2</option>
                                            <option {{ $asset->jenis == 'Roda 4' ? 'selected' : '' }} value="Roda 4">Roda 4</option>
                                            <option {{ $asset->jenis == 'Meubelair' ? 'selected' : '' }} value="Meubelair">Meubelair</option>
                                            <option {{ $asset->jenis == 'Elektronik' ? 'selected' : '' }} value="Elektronik">Elektronik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Deskripsi</label>
                                        <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" value="{{ $asset->deskripsi }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Tanggal Beli</label>
                                        <input type="date" class="form-control" placeholder="Tanggal Beli" name="tanggal_beli" value="{{ $asset->tanggal_beli }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Value Beli</label>
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                            <input type="text" class="form-control" placeholder="Value Beli" name="value_beli" value="{{ $asset->value_beli }}" readonly onkeydown="return ( event.ctrlkey || event.altkey
                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                            || (95<event.keyCode && event.keyCode<106)
                                            || (event.keyCode==8) || (event.keyCode==9)
                                            || (event.keyCode>34) && (event.keyCode<40)
                                            || (event.keyCode==46) )">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Umur Ekonomis (Tahun)</label>
                                        <input type="text" id="umur_ekonomis" class="form-control" placeholder="Umur Ekonomis"
                                            name="umur_ekonomis" readonly min="1" value="{{ $asset->umur_ekonomis }}" required onkeydown="return ( event.ctrlkey || event.altkey
                                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                    || (95<event.keyCode && event.keyCode<106)
                                    || (event.keyCode==8) || (event.keyCode==9)
                                    || (event.keyCode>34) && (event.keyCode<40)
                                    || (event.keyCode==46) )">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Kondisi</label>
                                        <select name="kondisi" id="kondisi" class="form-control" readonly>
                                            <option {{ $asset->kondisi == 'Baru' ? 'selected' : '' }} value="Baru">Baru</option>
                                            <option {{ $asset->kondisi == 'Sedang digunakkan' ? 'selected' : '' }} value="Sedang digunakkan">Sedang digunakkan</option>
                                            <option {{ $asset->kondisi == 'Rusak(bisa diperbaiki)' ? 'selected' : '' }} value="Rusak(bisa diperbaiki)">Rusak(bisa diperbaiki)</option>
                                            <option {{ $asset->kondisi == 'Rusak(tidak bisa diperbaiki)' ? 'selected' : '' }} value="Rusak(tidak bisa diperbaiki)">Rusak(tidak bisa diperbaiki)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-actions">
                        <a href="/asset/index">
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