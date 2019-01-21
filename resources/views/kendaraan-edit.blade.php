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
                        <strong>Edit Kendaraan</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('kendaraan.update',['id' => $kendaraan->plat_nomor ]) }}" method="POST" enctype="multipart/form-data"
                              class="form-horizontal">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="plat_nomor" class=" form-control-label">Plat
                                        Nomor</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="plat_nomor" name="plat_nomor"
                                                                    placeholder="Masukkan plat nomor"
                                                                    value="{{ $kendaraan->plat_nomor }}"
                                                                    class="form-control">
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
                                                                    placeholder="Masukkan nomor rangka"
                                                                    value="{{ $kendaraan->nomor_rangka }}"
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
                                                                    placeholder="Masukkan nomor mesin"
                                                                    value="{{ $kendaraan->nomor_mesin}}"
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
                                <div class="col-12 col-md-9"><input type="date" id="stnk" name="stnk"
                                                                    value="{{ $kendaraan->stnk }}"
                                                                    class="form-control">
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
                                <div class="col-12 col-md-9"><input type="date" id="pajak" name="pajak"
                                                                    value="{{ $kendaraan->pajak }}"
                                                                    class="form-control">
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
                                <div class="col-12 col-md-9"><input type="date" id="kir" name="kir"
                                                                    value="{{ $kendaraan->kir }}"
                                                                    class="form-control">
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
                                            <option value="{{ $jk->id }}" @if($kendaraan->jenis_kendaraan_id == $jk->id) selected @endif>{{ $jk->nama }}</option>
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
                                            <option value="{{ $supir->id }}" @if($kendaraan->supir_id == $supir->id) selected @endif>{{ $supir->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Edit
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