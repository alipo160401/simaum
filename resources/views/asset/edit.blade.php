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
                          <h4 class="form-section">Edit Asset</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi Ruang</label>
                                        <select name="id_ruang" id="id_ruang" class="form-control">
                                            @foreach ($ruang as $item)
                                            
                                                <option value="{{ $item->id }}" {{ $item->id == $asset->id_ruang ? 'selected' : '' }}>{{ $item->nama }}, Kode Ruang: {{ $item->kode }}, Jenis Ruang: {{ $item->jenis }}</option>

                                            @endforeach
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Nama Asset</label>
                                        <input type="text" class="form-control" placeholder="Nama Asset" name="nama" value="{{ $asset->nama }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Kode Asset</label>
                                        <input type="text" class="form-control" placeholder="Kode Asset" name="kode" value="{{ $asset->kode }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control" required>
                                            <option value="Infrastruktur" {{ $asset->kategori == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                                            <option value="Inventaris" {{ $asset->kategori == 'Inventaris' ? 'selected' : '' }}>Inventaris</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Sub Kategori</label>
                                        <select name="sub_kategori" id="sub_kategori" class="form-control" required>
                                            <option value="Tanah" class="opsi-infrastruktur" {{ $asset->sub_kategori == 'Tanah' ? 'selected' : '' }}>Tanah</option>
                                            <option value="Gedung" class="opsi-infrastruktur" {{ $asset->sub_kategori == 'Gedung' ? 'selected' : '' }}>Gedung</option>
                                            <option value="Kendaraan" class="opsi-infrastruktur" {{ $asset->sub_kategori == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                                            <option value="Alat Kantor" class="opsi-inventaris" {{ $asset->sub_kategori == 'Alat Kantor' ? 'selected' : '' }}>Alat Kantor</option>
                                            <option value="Fasilitas Perkuliahan" class="opsi-inventaris" {{ $asset->sub_kategori == 'Fasilitas Perkuliahan' ? 'selected' : '' }}>Fasilitas Perkuliahan</option>
                                            <option value="Other" {{ $asset->sub_kategori == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="sub_kategori_other">
                                    <div class="form-group">
                                        <label >Sub Kategori (Other)</label>
                                        <input type="text" name="sub_kategori_other" class="form-control" placeholder="Silahkan isi kolom ini.." value="{{ $asset->sub_kategori }}">
                                    </div>
                                </div>
                                <div class="col-md-12" id="jenis">
                                    <div class="form-group">
                                        <label >Jenis</label>
                                        <select name="jenis" class="form-control" required>
                                            <option value="-" class="hide">-</option>
                                            <option value="Roda 2" class="opsi-kendaraan" {{ $asset->jenis == 'Roda 2' ? 'selected' : '' }}>Roda 2</option>
                                            <option value="Roda 4" class="opsi-kendaraan" {{ $asset->jenis == 'Roda 4' ? 'selected' : '' }}>Roda 4</option>
                                            <option value="Meubelair" class="opsi-selain-kendaraan" {{ $asset->jenis == 'Meubelair' ? 'selected' : '' }}>Meubelair</option>
                                            <option value="Elektronik" class="opsi-selain-kendaraan" {{ $asset->jenis == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Deskripsi</label>
                                        <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" value="{{ $asset->deskripsi }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Tanggal Beli</label>
                                        <input type="date" class="form-control" placeholder="Tanggal Beli" name="tanggal_beli" value="{{ $asset->tanggal_beli }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Value Beli</label>
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                            <input type="text" class="form-control" placeholder="Value Beli" name="value_beli" value="{{ $asset->value_beli }}" onkeydown="return ( event.ctrlkey || event.altkey
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
                                            name="umur_ekonomis" min="1" value="{{ $asset->umur_ekonomis }}" required onkeydown="return ( event.ctrlkey || event.altkey
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
                                        <select name="kondisi" id="kondisi" class="form-control" required>
                                            <option {{ $asset->kondisi == 'Baru' ? 'selected' : '' }} value="Baru">Baru</option>
                                            <option {{ $asset->kondisi == 'Sedang digunakkan' ? 'selected' : '' }} value="Sedang digunakkan">Sedang digunakkan</option>
                                            <option {{ $asset->kondisi == 'Rusak(bisa diperbaiki)' ? 'selected' : '' }} value="Rusak(bisa diperbaiki)">Rusak(bisa diperbaiki)</option>
                                            <option {{ $asset->kondisi == 'Rusak(tidak bisa diperbaiki)' ? 'selected' : '' }} value="Rusak(tidak bisa diperbaiki)">Rusak(tidak bisa diperbaiki)</option>
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

@if ($asset->sub_kategori != 'Other')
    <script>
        $("#sub_kategori_other").hide();
        $("#jenis").hide();
    </script>
@endif

<script>
    $(document).ready(function(){
        $("#sub_kategori").on("change", function(){
            value = $(this).val();
            console.log(value);
            if (value == "Kendaraan") {
                $(".opsi-selain-kendaraan").hide();
                $(".opsi-kendaraan").show();
                $("#jenis option[value='Roda 2']").attr("selected", true);
            }
            if(value == "Tanah" || value == "Gedung"){
                $("#jenis").hide();
            }else{
                $("#jenis").show();
            }
            if (value == "Other") {
                $("#sub_kategori_other").show();
                $("#jenis").hide();
            }else{
                $("#sub_kategori_other").hide();
            };
        });
        $(".opsi-inventaris").hide();
        $("#kategori").on("change", function(){
            value = $(this).val();
            console.log(value);
            if (value == "Infrastruktur") {
                $(".opsi-inventaris").hide();
                $(".opsi-selain-kendaraan").hide();
                $(".opsi-infrastruktur").show();
                $(".opsi-kendaraan").show();
                $("#sub_kategori option[value='Tanah']").attr("selected", true);
                $("#jenis option[value='Roda 2']").attr("selected", true);
            }else if(value == "Inventaris"){
                $(".opsi-kendaraan").hide();
                $(".opsi-infrastruktur").hide();
                $(".opsi-inventaris").show();
                $(".opsi-selain-kendaraan").show();
                $("#sub_kategori option[value='Alat Kantor']").attr("selected", true);
                $("#jenis option[value='Meubelair']").attr("selected", true);
            }
        });
    });
</script>
@endsection