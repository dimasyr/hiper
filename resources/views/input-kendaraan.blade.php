@extends('layout.parent')

@section('title', 'Hiper')

@section('content')

    <!-- Content -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-12">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1><a href="{{ route('kendaraan.index') }}">Data Kendaraan</a> / Tambah Kendaraan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
    @include('layouts.alert')
    <!-- Animated -->
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Tambah Kendaraan</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('kendaraan.store') }}" method="POST" enctype="multipart/form-data"
                              class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="plat_nomor" class=" form-control-label">Plat
                                        Nomor</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="plat_nomor" name="plat_nomor"
                                                                    placeholder="Masukkan plat nomor"
                                                                    class="form-control" value="{{ old('plat_nomor') }}">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('plat_nomor'))
                                            {{ $errors->first('plat_nomor') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nomor_rangka" class=" form-control-label">Nomor
                                        Rangka</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nomor_rangka" name="nomor_rangka"
                                                                    placeholder="Masukkan nomor rangka" value="{{ old('nomor_rangka') }}"
                                                                    class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('nomor_rangka'))
                                            {{ $errors->first('nomor_rangka') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nomor_mesin" class=" form-control-label">Nomor
                                        Mesin</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nomor_mesin" name="nomor_mesin"
                                                                    placeholder="Masukkan nomor mesin" value="{{ old('nomor_mesin') }}"
                                                                    class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('nomor_mesin'))
                                            {{ $errors->first('nomor_mesin') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="stnk"
                                                                 class=" form-control-label">Stnk</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="stnk" autocomplete="off"
                                                                    class="form-control tanggal" value="{{ old('stnk') }}">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('stnk'))
                                            {{ $errors->first('stnk') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="pajak"
                                                                 class=" form-control-label">Pajak</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="pajak" autocomplete="off"
                                                                    class="form-control tanggal" value="{{ old('pajak') }}">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('pajak'))
                                            {{ $errors->first('pajak') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="kir"
                                                                 class=" form-control-label">Kir</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="kir" autocomplete="off"
                                                                    class="form-control tanggal" value="{{ old('kir') }}">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('kir'))
                                            {{ $errors->first('kir') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Jenis Kendaraan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="jenis_kendaraan_id" id="jenis_kendaraan_id" class="form-control">
                                        @foreach($jenis_kendaraan as $jk)
                                            <option value="{{ $jk->id }}" @if($jk->id == old('jenis_kendaraan_id')) selected @endif>{{ $jk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Supir</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="supir_id" id="supir_id" class="form-control">
                                        <option value="">-Kosong-</option>
                                        @foreach($supirs as $supir)
                                            <option value="{{ $supir->id }}" @if($supir->id == old('supir_id')) selected @endif>{{ $supir->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection